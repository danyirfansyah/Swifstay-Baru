<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/signInStyle.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>insert</title>
</head>
<body>
    <div class="add">
    <form id="insert" class="form-container" method="POST" action = "{{ route('storeKos') }}" enctype="multipart/form-data" >
        @csrf
        <h2 style="color:#4cb53f; font-size: 36px; font-weight: 500; width: 250px; margin-top: 100px">Tambah Kos</h2>
        <br><br><br>
        <label class="form-label" for="name"></label> 
        <input class="form-input" type="text" 
            placeholder="Nama" 
            id="name" name="name" required>
            
        <label class="form-label" for="location"></label> 
        <input class="form-input" type="text" 
            placeholder="Lokasi" 
            id="location" name="location" required>        

        <label class="form-label" for="facility"></label> 
        <input class="form-input" type="text" 
               placeholder="Fasilitas"
               id="facility" name="facility" required>

        <label class="form-label" for="facility"></label> 
        <textarea class="form-input" name="deskripsi" placeholder="Deskripsi" id=""></textarea>

        <label class="form-label" for="facility"></label> 
        <select class="form-input" name="kelas" id="">
                <option value="Ekonomi">Ekonomi</option>
                <option value="Reguler">Reguler</option>
                <option value="Eksklusif">Eksklusif</option>
            </select>

        <label class="form-label" for="facility"></label> 
        <input class="form-input" type="text" 
               placeholder="Ukuran"
               id="facility" name="ukuran" required>

        <label class="form-label" for="facility"></label> 
        <input class="form-input" type="text" 
               placeholder="Akses Kendaraan"
               id="facility" name="akses" required>
        
        <label class="form-label" for="price"></label> 
        <input class="form-input" type="text" 
              placeholder="Harga"
              id="price" name="price" required>  

        <label class="form-label" for="price"></label> 
        <input class="form-input" type="text" 
              placeholder="Nomer"
              id="price" name="no_telp" value="62" required>  
       
        <label class="form-label" for="image"></label> 
        <input class="form-input" type="file" 
              id="image" name="file" required>
              
        <button name="submit" class="btn-submit" type="submit">Insert</button> 
    </form>
    </div>
</body>
</html>