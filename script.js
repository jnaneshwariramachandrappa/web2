function validateForm() {
    const payment = document.getElementById('payment').value;
    if (payment <= 0) {
      alert("Payment must be a positive number.");
      return false;
    }
    return true;
  }