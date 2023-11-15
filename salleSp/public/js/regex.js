const emailInput = document.getElementById('emailInput');
const emailError = document.getElementById('emailError');

emailInput.addEventListener('input', function() {
  const email = emailInput.value;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
  if (emailRegex.test(email)) {
    emailError.textContent = '';
    emailError.style.display = 'none';
  } else {
    emailError.textContent =email+' Invalid email';
    emailError.style.display = 'block';
  }
});
/**************************** password */
const passwordInput = document.getElementById('passwordInput');
  const cpasswordInput = document.getElementById('cpasswordInput');
  const passwordError = document.getElementById('passwordError');
  const cpasswordError = document.getElementById('cpasswordError');

  cpasswordInput.addEventListener('input', function() {
    const password = passwordInput.value;
    const cpassword = cpasswordInput.value;
    const minPasswordLength = 4;
    const maxPasswordLength = 12;

    if (password !== cpassword) {
      cpasswordError.textContent = 'Passwords do not match';
      cpasswordError.style.display = 'block';
    } else {
      cpasswordError.textContent = '';
      cpasswordError.style.display = 'none';
    }

    if (password.length < minPasswordLength || password.length > maxPasswordLength) {
      passwordError.textContent = 'Password must be between 8 and 12 characters';
      passwordError.style.display = 'block';
    } else {
      passwordError.textContent = '';
      passwordError.style.display = 'none';
    }
  });
  /////////////////////////////////phone
  const teleInput = document.getElementById('teleInput');
  const teleError = document.getElementById('teleError');

  teleInput.addEventListener('input', function() {
    const tele = teleInput.value;
    const teleRegex = /^\d{10}$/; 

    if (teleRegex.test(tele)) {
      teleError.textContent = '';
      teleError.style.display = 'none';
    } else {
      teleError.textContent = 'Invalid phone number';
      teleError.style.display = 'block';
    }
  });
  //////////////////////////////cni
  const cniInput = document.getElementById('cniInput');
  const cniError = document.getElementById('cniError');

  cniInput.addEventListener('input', function() {
    const cni = cniInput.value;
    const cniRegex = /^[A-Za-z]{2}\d{6}$/;

    if (cniRegex.test(cni)) {
      cniError.textContent = '';
      cniError.style.display = 'none';
    } else {
      cniError.textContent = 'Invalid C.N.I';
      cniError.style.display = 'block';
    }
  });