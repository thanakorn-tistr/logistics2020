/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function onDelete()
            {
                if (confirm('  กรุณายืนยันการลบข้อมูลที่เลือกอีกครั้ง !!!  ') === true)
                {
                    return true;
                } else
                {
                    return false;
                }
            }
          
function GotoDeleteBooking(xx)
{
	if(confirm('  กรุณายืนยันการลบอีกครั้ง !!!  '))
       {
    
  		window.location="other/save_delete.php?ros_id="+xx;
			
	   }
    else
      {
	     return false;
      }
}

function EditBkM(xx)
            {
                window.location="other/save_edit.php?ros_id="+xx;
            }
function EditUndo(xx)
            {
                window.location="other/save_editundo.php?ros_id="+xx;
            }            
function OpenBkM(xx)
            {
                window.location = "detail_book_mem.php?ID=" + xx;
            }            

function EditBooking(xx)
            {
                window.location="edit_booking.php?ID="+xx;
            }
function Logout()
            {
                window.location="./other/check_logout.php?";
            }     
 function Excel()
            {
                window.location="./other/print_excel.php?";
            } 
 function Upload()
            {
                window.location="./insert_doc.php";
            }	
function GotoDeleteDoc(xx)
            {
                window.location="./delete_doc.php";
            }	
function DeleteDoc(xx)
            {
                window.location="other/save_deletedoc.php?id="+xx;
            }
function Home()
            {
                window.location="index1.php";
            }  		
function Reject(xx)
            {
                window.location="other/save_reject.php?ros_id="+xx;
            } 			
function Regis()
            {
                //window.location="./admin_reg.php";
				window.open("./admin_reg.php",'_blank'); 
            } 
function Regis13()
            {
                //window.location="./admin_reg13.php";
				window.open("./admin_reg13.php",'_blank'); 
            } 
function Conf(xx)
            {
                window.location="./conf_reg.php?ros_id="+xx;
            } 
function Conf13(xx)
            {
                window.location="./conf_reg13.php?ros_id="+xx;
            } 
function Undo(xx)
            {
                window.location="./undo_reg.php?ros_id="+xx;
            } 
function Undo13(xx)
            {
                window.location="./undo_reg13.php?ros_id="+xx;
            } 
 function Excelreg()
            {
                window.location="./other/print_excelreg.php?";
            }   
 function Excelreg13()
            {
                window.location="./other/print_excelreg13.php?";
            }   
function GotoCheckMember(xx)
            {
                window.location="checkmember.php";
            } 
function Gotoindex()
            {
                window.location="index.php";
            } 
function Graph()
            {
                window.location="graph.php";
            }	
function RegistrationAdmin()
            {
                window.location="RegistrationAdmin.php"; 
            }
function RegistrationAdmin()
            {
                window.location="RegistrationAdmin.php"; 
            }
function CheckMemberAll()
            {
                window.open("showmemberAll.php",'_blank'); 
            }