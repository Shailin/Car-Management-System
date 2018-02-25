function showpay() {
 if (document.calc.dist.value == null )
     
 { document.calc.pay.value = "Incomplete data";
 }
 else
 {
 var princ = document.calc.dist.value;

 document.calc.pay.value = princ * 70.7;
 }


}
