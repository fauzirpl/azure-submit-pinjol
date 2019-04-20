# azure-submit-pinjol
Repository untuk menyelesaikan submission pada Kelas Menjadi Azure Cloud Developer di Dicoding.
Lakukan costumisasi pada bagian berikut karena akun azure saya hanya trial sesuaikan dengan key dan lain-lain sesuai
dengan milik anda.
FILE : azure.php
  => Ubah pada LOC 8, 9, 20
  $this->azure_celebRecognition="https://southeastasia.api.cognitive.microsoft.com/vision/v2.0/models/celebrities/analyze";
  $this->azure_imageRecognition="https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/describe";
  $this->subscription_key="2a1574067cab4b19a07c100235c92bdf";
 
Sesuaikan dengan domain Computer Vision server milik anda. Lalu ubah juga subs key Computer Vision anda.

FILE : phpQS.php
  => Ubah pada LOC 45
  $connectionString = "DefaultEndpointsProtocol=https;AccountName=blobrplp....;AccountKey=QfKxSlEXpvkKv+ccGx3z2.....";
  Sesuaikan dengan endpoint Blob anda
  
  => Ubah pada LOC 73
  $containerName = "pinjo....";
  Sesuaikan dengan container Blob anda
