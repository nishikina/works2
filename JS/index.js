function handleFileSelect(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('preview').src = e.target.result;
      document.getElementById('preview').style.display = 'block';
    };
    reader.readAsDataURL(file);
  }
  
  function showAlert(message) {
    alert(message);
  }  