# azure-submit-pinjol
Repository untuk menyelesaikan submission pada Kelas Menjadi Azure Cloud Developer di Dicoding.<br>
Lakukan costumisasi pada bagian berikut karena akun azure saya hanya trial sesuaikan dengan key dan lain-lain sesuai
dengan milik anda.<br><br>
FILE : azure.php<br>
  => Ubah pada LOC 8, 9, 20<br>
  $this->azure_celebRecognition="https://southeastasia.api.cognitive.microsoft.com/vision/v2.0/models/celebrities/analyze";<br>
  $this->azure_imageRecognition="https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/describe";<br>
  $this->subscription_key="2a1574067cab4b19a07c100235c92bdf";<br>
 <br><br>
Sesuaikan dengan domain Computer Vision server milik anda. Lalu ubah juga subs key Computer Vision anda.<br>
<br><br>
FILE : phpQS.php<br>
  => Ubah pada LOC 45<br>
  $connectionString = "DefaultEndpointsProtocol=https;AccountName=blobrplp....;AccountKey=QfKxSlEXpvkKv+ccGx3z2.....";<br>
  Sesuaikan dengan endpoint Blob anda<br>
  <br><br>
  => Ubah pada LOC 73<br>
  $containerName = "pinjo....";<br>
  Sesuaikan dengan container Blob anda<br>
