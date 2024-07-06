<?php  
 include("partials/config.php"); 
 $output = '';  
 $sql = "SELECT * FROM events ORDER BY id DESC";  
 $result = mysqli_query($db, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table"> 
              <thead> 
                <tr>  
                     <th width="10%" style="text-align: center;">Title</th>  
                     <th width="30%" style="text-align: center;">Description</th> 
                     <th width="15%" style="text-align: center;">Venue</th> 
                     <th width="10%" style="text-align: center;">Date</th>
                     <th width="10%" style="text-align: center;">Starts</th> 
                     <th width="10%" style="text-align: center;">Ends</th>   
                     <th width="5%" style="text-align: center;">Display</th>
                     <th width="10%" colspan="2" style="text-align: center;">Action</th>  
                </tr>
              </thead>
              <tbody>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($events = mysqli_fetch_array($result))  
      {  

           $output .= '  
                <tr>  
                     <td class="event_title" data-id1="'.$events['id'].'">'.$events["event_title"].'</td>  
                     <td class="event_desc" data-id2="'.$events['id'].'">'.$events["event_description"].'</td>  
                     <td class="event_venue" data-id3="'.$events['id'].'">'.$events["event_venue"].'</td> 
                     <td class="event_date" data-id4="'.$events['id'].'">'.$events["event_date"].'</td>
                     <td class="start_time" data-id5="'.$events['id'].'">'.$events["start_time"].'</td>
                     <td class="end_time" data-id6="'.$events['id'].'">'.$events["end_time"].'</td>  
                     <td id="displayEvent"><button data-id7="'.$events['id'].'" id="'.($events['id']).'"'.($events['display'] === 'Yes ' ? 'class="btn btn-success display-btn">' : 'class="btn btn-danger display-btn">').''.$events['display'].' '.($events['display'] === 'Yes ' ? '<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>' ).'</button></td>
                     <td id="editEvent"><button data-id8="'.$events['id'].'" id="'.($events['id']).'" class="btn edit-btn">Edit &nbsp;<span class="glyphicon glyphicon-pencil"></span></button></td> 
                     <td id="deleteEvent"><button data-id9="'.$events['id'].'" id="'.($events['id']).'" class="btn btn-danger delete-btn">Delete &nbsp;<span class="glyphicon glyphicon-trash"></span></button></td>  
                </tr>
           ';  
      }  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="8">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</tbody>
        </table>  
      </div>';  
 echo $output;  
 ?>