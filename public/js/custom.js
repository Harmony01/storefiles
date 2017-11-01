function calculate(){

	var price = document.getElementById('price').value;
	var discount = document.getElementById('discount').value;
	var nprice = document.getElementById('nprice');
	var percent = (discount/100);
	var red = price*percent;
	var netPrice = price-red;
	var check1 = document.getElementById('check1');
	var check2 = document.getElementById('check2');
	if (isNaN(price)) {
		check1.innerHTML = "Error! Please type a number!";
	} else if(isNaN(discount)){
       
       check2.innerHTML = "Error! Please type a number!";
	}else{
		nprice.value = netPrice.toFixed(2);
	}
}

$(document).ready(function(){
     $('#update').click(function(e){
        e.preventDefault();
        $('#form1').attr('action', '/product/update');
        $('#form1').submit();
     });

      $('#delete').click(function(e){
        e.preventDefault();
        $('#form1').attr('action', '/product/delete');
        $('#form1').submit();
     });

      $('#imageUpdate').on("change", function(e){
       var fileName = e.target.value.split("\\").pop();
       $('#show').text(fileName);
    }); 

     $('#imageUpdate1').on("change", function(e){
       var fileName = e.target.value.split("\\").pop();
       $('#show1').text(fileName);
    });

    $('#del').click(function(e){
      var confirm = window.confirm('Make sure you confirm payment! Are you Sure you want to send delivery?');
      if(confirm){
        }else{
          alert('delivery noticed aborted')
         e.preventDefault(); 
        }
    });
//declared delivered--------------------------------------
//prevent sending district if region not selected---------
$('#sendDis').click(function(e){
    var reg = $('#reg').val();
     var name = $('#name').val();
      if(reg=='----select Region---'){
         alert('Please select region');
         e.preventDefault(); 
        }else if(name==""){
           alert('Please input district');
         e.preventDefault(); 
        }
    });
//order form validation============================================================
//check and make sure only number is entered in those requiring numbers============

$('#tel').on('keyup', function(){
   
  checkNumber();
});

$('#amt').on('keyup', function(){
 
  checkNumber();
});
function checkNumber()
{
  var tel = $('#tel').val();
  var amt = $('#amt').val(); 
 if(isNaN(tel)){
     $('#telCheck').text('Error!! Characters 0-9 only is accepted.');
     $('#telCheck').addClass('alert');

  }
  
  if(isNaN(amt)){
     $('#amountCheck').text('Error!! Characters 0-9 only is accepted. live comma and the cedi sign. eg type GHS 30 as just 30');
     $('#amountCheck').addClass('alert');

  } 
}
//validate form sumbmition
$('#submit').click(function(e){
   var tel = $('#tel').val();
   var amt = $('#amt').val(); 
   var reg = $('#reg').val();
   var dis = $('#dis').val();
   var result = $('#result');
   var feedBack = "";

    if (isNaN(tel)) {
         e.preventDefault();
         feedBack ='<i class="fa fa-times"></i>'+ 'ERROR!! Unacepted character input for telephone number';
         result.html(feedBack);
         result.show().fadeIn(1000);
     }else if (reg=="--please select--") {
          e.preventDefault();
          feedBack='<i class="fa fa-times"></i>'+"ERROR! Please select Region";
          result.html(feedBack);
          result.show().fadeIn(1000);
     }else if (dis=="---Please Select---") {
          e.preventDefault();
          feedBack='<i class="fa fa-times"></i>'+"ERROR! Please select Your district";
          result.html(feedBack);
          result.show().fadeIn(1000);
     }else if (isNaN(amt)) {
         e.preventDefault();
         feedBack ='<i class="fa fa-times"></i>'+ 'ERROR!! Unacepted character input for amount';
         result.html(feedBack);
         result.show().fadeIn(1000);
       }
  });
});



