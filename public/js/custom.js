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
    $('#delivered').click(function(e){
      var amount = $('#bal').text();
      if (amount > 0) {
        e.preventDefault();
       alert('Delivery cannot be confirmed! Customer is owing, Delievery will only be confirmed when customer makes full payment. Enter Payment if customer has made full payment');

      }
    }); 
  });

