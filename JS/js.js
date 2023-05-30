document.getElementById("form_upload").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
  
    var fileInput = document.getElementById("fileUpload");
    var files = fileInput.files;
  
    var formData = new FormData();
    for (var i = 0; i < files.length; i++) {
      formData.append("file", files[i]);
    }
  
    var accessToken = "AibDjWxAdKfd4Kt70QiIDBnLhfhHI1EXcSAlFdVqnHo"; // Replace with your Netlify API access token
  
    fetch("https://api.netlify.com/api/v1/sites/c05bd4a2-fa86-4c78-972a-1424b1fc46e5/uploads", {
      method: "POST",
      headers: {
        Authorization: "Bearer " + accessToken
      },
      body: formData
    })
      .then(response => response.json())
      .then(data => {
        console.log("Upload successful:", data);
      })
      .catch(error => {
        console.error("Upload failed:", error);
      });
  });
  