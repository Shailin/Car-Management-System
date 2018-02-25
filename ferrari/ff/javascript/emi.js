function show() {
 if ((document.calc1.loan.value == null || document.calc1.loan.value.length == 0) ||
     (document.calc1.months.value == null || document.calc1.months.value.length == 0)
||
     (document.calc1.rate.value == null || document.calc1.rate.value.length == 0))
 { document.calc1.pay.value = "Incomplete data";
 }
 else
 {
 var princ = document.calc1.loan.value;
 var term  = document.calc1.months.value;
 var intr   = document.calc1.rate.value / 1200;
 document.calc1.pay.value = princ * intr * (Math.pow((1 + intr), term)) / ((Math.pow((1 + intr), term)) - 1);
 }

}