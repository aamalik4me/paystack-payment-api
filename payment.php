<head>
  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<form>


<!-- paidid  paidname  paidphone paidemail paidproduct paidamount  paidreference paiddate -->


    <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" id="email-address" required />
  </div>
  <div class="form-group">
    <label for="amount">Amount</label>
    <input type="tel" id="amount" required />
  </div>
  <div class="form-group">
    <label for="first-name">First Name</label>
    <input type="text" id="first-name" />
  </div>
  <div class="form-group">
    <label for="last-name">Last Name</label>
    <input type="text" id="last-name" />
  </div>

  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()"> Pay </button> 
</form>

<!-- place below the html form -->
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_182442ea37e2792358fddd0c8dba7187efa22961',
     email: document.getElementById("email-address").value,
      amount: document.getElementById("amount").value * 100,
      firstname: document.getElementById("first-name").value,
      lastname: document.getElementById("first-name").value,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
          var reference = response.reference;
          window.location = "verify_transaction.php?reference=" + response.reference; 
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>