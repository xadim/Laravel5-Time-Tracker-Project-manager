<?php


function delete_form($routeParam, $label = 'Delete')
{
	$form = Form::open(['method' => 'DELETE', 'route' => $routeParam, 'onsubmit' => 'return ConfirmDelete()']);

	$form.= Form::submit($label, ['class'=>'btn-link']);

	return $form.= Form::close();
}


/**
*
*Function that retrieve all comments/contributions in a project
**/

function retrieveComments($projectID)
{

	return \App\models\Comment::whereProject_id($projectID)->orderBy('id', 'desc')->get();

}


function retrieveProjectOwner($user_id)
{

	$query = \App\User::whereId($user_id)->first();
	return $query->name;

}


function progressStatus($status){

//'Almost done' = time >= 4hours - 14000s
//'Work-in-Progress' = time <= 4hours - 14000s
//'Work-Done' = all the task are finished
//Not started == 'Any task was started'

	if ($status == 'Project finished'){
		echo '<span class="glyphicon glyphicon-ok green" aria-hidden="true"></span>';
	}

	elseif ($status > 0){
		echo '<span class="glyphicon glyphicon-cloud blue" aria-hidden="true"></span>';
	}

	elseif ($status == 'Project not started'){
		echo '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>';
	}

}


/**
 *
 * Clean string and convert it it into an clean array
 * @param $string
 *
 */

function explodeString($string){

	return $data   = preg_split('/[\ \n\,]+/', $string);

}

/**
 * Format an interval to show all existing components.
 * If the interval doesn't have a time component (years, months, etc)
 * That component won't be displayed.
 *
 * @param DateInterval $interval The interval
 *
 * @return string Formatted interval string.
 */
function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
    if ($interval->d) { $result .= $interval->format("%d days "); }
    if ($interval->h) { $result .= $interval->format("%h hours "); }
    if ($interval->i) { $result .= $interval->format("%i minutes "); }
    if ($interval->s) { $result .= $interval->format("%s seconds "); }

    return $result;
}


function dateInterval($first_date, $second_date){

	$difference = $first_date->diff($second_date);
	return format_interval($difference);

}

/**
 *
 * Return the today and now timestamp
 * @param Posted string
 *
 */

function nowTimestamp ($string){
	if ($string == 'notStart') {
		
		return $time = '0000-00-00 00:00:00';
	
	}
	else{
		$dt = new DateTime;
		$time = $dt->format('y-m-d H:i:s');
		return $time;
	}
}

Class timeTracker {
	
	function designsTimeTracker($projectID) {
		$pauses = 0;
		$restarts = 0;
		$startTime = '';
		$endTime = '';
		$finalPause = '';
		$finalRestart = '';

		$projectTaskTime = \App\models\Task::whereProject_id($projectID)->orderBy('id', 'asc')->get();

		foreach ($projectTaskTime as $task) {

			if ($task->status_task_designs == 'start') {

				$startTime = $task->task_designs;

			}
		
			if ($task->status_task_designs == 'pause') {
				
				$pauseTime[] = $task->task_designs;
				$pauses++;

				$finalPause = $task->task_designs;
			}

			if ($task->status_task_designs == 'restart') {
				
				$restartTime[] = $task->task_designs;
				$restarts++;

				$finalRestart = $task->task_designs;

			}

			if ($task->status_task_designs == 'end') {
				
				$endTime = $task->task_designs;
			}
		 
		 } 

		 if ($startTime) {

				/**
				* if the project's stask was started
				*
				*/

				$startedtime = new DateTime($startTime);

			
			if ($restarts) {

				/**
				* if the project has been restarted, calculate time between paused and restarted points again and again 
				* startedtime = started point time + sum(pauses time)
				*
				*/

				for ($j = 0; $j < $restarts; $j++) { 

					$ptime = new DateTime($pauseTime[$j]);
					$rtime = new DateTime($restartTime[$j]);

					$diffPausesAndRestart[] = $ptime->diff($rtime);
				}		
			
				for ($u=0; $u < $j; $u++) { 
					$startedtime->add( $diffPausesAndRestart[$u] );
				}
			}else{
				if ($pauses) {

				/**
				* if the project has been paused, calculate time between started and paused points 
				*
				*/

				$endTime = $pauseTime[0];

				}
			}
				

			if ($finalPause) {
				
				/**
				* if last stop before end is pause and not a restarted and the project is end or not
				*
				*/

				if ($finalRestart) {
					if ($finalPause > $finalRestart) {
						if ($endTime) {
							$ftime = new DateTime($finalPause);
							$etime = new DateTime($endTime);

							$diffPausesAndEnd = $ftime->diff($etime);
							$pauseFinal = $diffPausesAndEnd;
							$startedtime->add( $pauseFinal );
						}else{
							 
							 $endTime = $finalPause;
						}
					}else{
						if (empty($endTime)){
							$dt = new DateTime;
							$endTime = $dt->format('y-m-d H:i:s');
						}
					}
				}
			}

			if ($endTime) {
				
				/**
				* if the project is finished last stop will be end
				*
				*/

				$endedtime = new DateTime($endTime);
				return $fromStartToEnd = $startedtime->diff($endedtime);
				
				//return format_interval($fromStartToEnd);
			}else{

				$endTime = new DateTime;
				return $fromStartToEnd = $startedtime->diff($endTime);

				//return format_interval($fromStartToEnd);
			
			}
		}//if no startTime project was not started
		else{

			return 'Task not started';
		
		}
	}






	function devTimeTracker($projectID) {
		$pauses = 0;
		$restarts = 0;
		$startTime = '';
		$endTime = '';
		$finalPause = '';
		$finalRestart = '';

		$projectTaskTime = \App\models\Task::whereProject_id($projectID)->orderBy('id', 'asc')->get();

		foreach ($projectTaskTime as $task) {

			if ($task->status_task_dev == 'start') {

				$startTime = $task->task_dev;

			}
		
			if ($task->status_task_dev == 'pause') {
				
				$pauseTime[] = $task->task_dev;
				$pauses++;

				$finalPause = $task->task_dev;
			}

			if ($task->status_task_dev == 'restart') {
				
				$restartTime[] = $task->task_dev;
				$restarts++;

				$finalRestart = $task->task_dev;

			}

			if ($task->status_task_dev == 'end') {
				
				$endTime = $task->task_dev;
			}
		 
		 } 

		 if ($startTime) {

				/**
				* if the project's stask was started
				*
				*/

				$startedtime = new DateTime($startTime);

			
			if ($restarts) {

				/**
				* if the project has been restarted, calculate time between paused and restarted points again and again 
				* startedtime = started point time + sum(pauses time)
				*
				*/

				for ($j = 0; $j < $restarts; $j++) { 

					$ptime = new DateTime($pauseTime[$j]);
					$rtime = new DateTime($restartTime[$j]);

					$diffPausesAndRestart[] = $ptime->diff($rtime);
				}		
			
				for ($u=0; $u < $j; $u++) { 
					$startedtime->add( $diffPausesAndRestart[$u] );
				}
			}else{
				if ($pauses) {

				/**
				* if the project has been paused, calculate time between started and paused points 
				*
				*/

				$endTime = $pauseTime[0];

				}
			}
				

			if ($finalPause) {
				
				/**
				* if last stop before end is pause and not a restarted and the project is end or not
				*
				*/

				if ($finalRestart) {
					if ($finalPause > $finalRestart) {
						if ($endTime) {
							$ftime = new DateTime($finalPause);
							$etime = new DateTime($endTime);

							$diffPausesAndEnd = $ftime->diff($etime);
							$pauseFinal = $diffPausesAndEnd;
							$startedtime->add( $pauseFinal );
						}else{
							 
							 $endTime = $finalPause;
						}
					}else{
						if (empty($endTime)){
							$dt = new DateTime;
							$endTime = $dt->format('y-m-d H:i:s');
						}
					}
				}
			}

			if ($endTime) {
				
				/**
				* if the project is finished last stop will be end
				*
				*/

				$endedtime = new DateTime($endTime);
				return $fromStartToEnd = $startedtime->diff($endedtime);
				
				//return format_interval($fromStartToEnd);
			}else{

				$endTime = new DateTime;
				return $fromStartToEnd = $startedtime->diff($endTime);

				//return format_interval($fromStartToEnd);
			
			}
		}//if no startTime project was not started
		else{

			return 'Task not started';
		
		}
	}




	function prodTimeTracker($projectID) {
		$pauses = 0;
		$restarts = 0;
		$startTime = '';
		$endTime = '';
		$finalPause = '';
		$finalRestart = '';

		$projectTaskTime = \App\models\Task::whereProject_id($projectID)->orderBy('id', 'asc')->get();

		foreach ($projectTaskTime as $task) {

			if ($task->status_task_prod == 'start') {

				$startTime = $task->task_prod;

			}
		
			if ($task->status_task_prod == 'pause') {
				
				$pauseTime[] = $task->task_prod;
				$pauses++;

				$finalPause = $task->task_prod;
			}

			if ($task->status_task_prod == 'restart') {
				
				$restartTime[] = $task->task_prod;
				$restarts++;

				$finalRestart = $task->task_prod;

			}

			if ($task->status_task_prod == 'end') {
				
				$endTime = $task->task_prod;
			}
		 
		 } 

		 if ($startTime) {

				/**
				* if the project's stask was started
				*
				*/

				$startedtime = new DateTime($startTime);

			
			if ($restarts) {

				/**
				* if the project has been restarted, calculate time between paused and restarted points again and again 
				* startedtime = started point time + sum(pauses time)
				*
				*/

				for ($j = 0; $j < $restarts; $j++) { 

					$ptime = new DateTime($pauseTime[$j]);
					$rtime = new DateTime($restartTime[$j]);

					$diffPausesAndRestart[] = $ptime->diff($rtime);
				}		
			
				for ($u=0; $u < $j; $u++) { 
					$startedtime->add( $diffPausesAndRestart[$u] );
				}
			}else{
				if ($pauses) {

				/**
				* if the project has been paused, calculate time between started and paused points 
				*
				*/

				$endTime = $pauseTime[0];

				}
			}
				

			if ($finalPause) {
				
				/**
				* if last stop before end is pause and not a restarted and the project is end or not
				*
				*/

				if ($finalRestart) {
					if ($finalPause > $finalRestart) {
						if ($endTime) {
							$ftime = new DateTime($finalPause);
							$etime = new DateTime($endTime);

							$diffPausesAndEnd = $ftime->diff($etime);
							$pauseFinal = $diffPausesAndEnd;
							$startedtime->add( $pauseFinal );
						}else{
							 
							 $endTime = $finalPause;
						}
					}else{
						if (empty($endTime)){
							$dt = new DateTime;
							$endTime = $dt->format('y-m-d H:i:s');
						}
					}
				}
			}

			if ($endTime) {
				
				/**
				* if the project is finished last stop will be end
				*
				*/

				$endedtime = new DateTime($endTime);
				return $fromStartToEnd = $startedtime->diff($endedtime);
				
				//return format_interval($fromStartToEnd);
			}else{

				$endTime = new DateTime;
				return $fromStartToEnd = $startedtime->diff($endTime);

				//return format_interval($fromStartToEnd);
			
			}
		}//if no startTime project was not started
		else{

			return 'Task not started';
		
		}
	}
}



function toSeconds(DateInterval $interval) {
	

	$zero = 0;

	if ($interval != 'Task not started') {
		
	    $result = "";

	    $yearsInSec = 0;
	    $monthsInSec = 0;
	    $daysInSec = 0;
	    $hoursInSec = 0;
	    $minutesInSec = 0;
	    $seconds = 0;

	    if ($interval->y) { 
	    	$years = $interval->format("%y"); 
	    	$yearsInSec = $years * 126230400;
	    }
	    if ($interval->m) { 
	    	$months = $interval->format("%m"); 
	    	$monthsInSec = $months * 2592000;
	    }
	    if ($interval->d) { 
	    	$days = $interval->format("%d"); 
	    	$daysInSec = $days * 86400;
	    }
	    if ($interval->h) { 
	    	$hours = $interval->format("%h"); 
	    	$hoursInSec = $hours * 3600;
	    }
	    if ($interval->i) { 
	    	$minutes = $interval->format("%i"); 
	    	$minutesInSec = $minutes * 60;
	    }
	    if ($interval->s) { 
	    	$seconds = $interval->format("%s"); 
	    }
    	return $result = $yearsInSec + $monthsInSec + $daysInSec + $hoursInSec + $minutesInSec + $seconds;
    }else{
    	return $zero;
    }

}


function finalTime($date1, $date2, $date3){

	if ($date1 != 'Task not started' && $date2!= 'Task not started' && $date3!= 'Task not started') {
		return toSeconds($date1) + toSeconds($date2) + toSeconds($date3);
	}


	if ($date1 == 'Task not started' && $date2!= 'Task not started' && $date3!= 'Task not started') {
		return toSeconds($date2) + toSeconds($date3);
	}
	if ($date1!= 'Task not started' && $date2!= 'Task not started' && $date3 == 'Task not started') {
		return toSeconds($date1) + toSeconds($date2);
	}
	if ($date1!= 'Task not started' && $date2== 'Task not started' && $date3 != 'Task not started') {
		return toSeconds($date1) + toSeconds($date3);
	}


	if ($date1 == 'Task not started' && $date2 == 'Task not started' && $date3!= 'Task not started') {
		return toSeconds($date3);
	}
	if ($date1 == 'Task not started' && $date2!= 'Task not started' && $date3 == 'Task not started') {
		return toSeconds($date2);
	}

	if ($date1!= 'Task not started' && $date2== 'Task not started' && $date3== 'Task not started') {
		return toSeconds($date1);
	}

}


function secondsToTime($seconds)
{
    $ret = "";

    /*** get the days ***/
    $days = intval(intval($seconds) / (3600*24));
    if($days> 0)
    {
        $ret .= "$days days ";
    }

    /*** get the hours ***/
    $hours = (intval($seconds) / 3600) % 24;
    if($hours > 0)
    {
        $ret .= "$hours hours ";
    }

    /*** get the minutes ***/
    $minutes = (intval($seconds) / 60) % 60;
    if($minutes > 0)
    {
        $ret .= "$minutes minutes ";
    }

    /*** get the seconds ***/
    $seconds = intval($seconds) % 60;
    if ($seconds > 0) {
        $ret .= "$seconds seconds";
    }

    return $ret;
}





function retrieveUsers()
{
		
		$results = array();
		
		$queries = \App\User::orderBy('id', 'desc')->get();

		//dd($queries);

		foreach ($queries as $query)
		{
		    $results[] = [ 'id' => $query->id, 'value' => $query->email ];
		}

	return json_encode($results);
}


function retrieveOneUser($email){
		
		return $searchUsers = \App\User::whereEmail($email)->first();

		

}
		

function projectStatus($projectID){

	return $status = \App\models\Task::whereProject_id($projectID)
	     ->orderBy('id', 'desc')->first();

}











