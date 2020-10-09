/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function OpenTraining(xx)
            {
                window.location = "detail_training.php?ID=" + xx;
            }
            
function GotoDeleteFile(xx,xxx)
{
	if(confirm('  กรุณายืนยันการลบอีกครั้ง !!!  '))
       {
    
  		window.location="other/save_delete.php?ID="+xx+"&setting="+xxx;
			
	   }
    else
      {
	     return false;
      }
}

function EditTraining(xx)
            {
                window.location="edit_training.php?ID="+xx;
            }
                    
          


