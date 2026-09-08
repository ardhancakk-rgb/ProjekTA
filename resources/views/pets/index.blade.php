<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pets - PetNest</title>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        body {

            background: #d9d6c8;
            padding: 30px;

        }


        /* container card */

        .pet-container {

            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;

        }



        /* card */

        .pet-card {

            background: #eee9cf;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, .25);

        }



        /* gambar */

        .pet-card img {

            width: 100%;
            height: 170px;
            object-fit: cover;

        }



        /* isi card */

        .pet-content {

            padding: 15px;

        }



        .category {

            background: #4b2515;
            color: white;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 20px;

        }



        .pet-name {

            display: flex;
            justify-content: space-between;
            align-items: center;

        }



        .pet-name h2 {

            font-size: 22px;
            font-weight: 400;
            color: #665848;

        }



        .age {

            background: #4b2515;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;

        }



        .gender {

            color: #665848;
            margin-top: 5px;

        }



        /* tag */

        .tags {

            display: flex;
            gap: 8px;
            margin-top: 15px;

        }



        .tag {

            background: #4b2515;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;

        }



        /* button */


        .btn {

            display: block;
            margin-top: 20px;
            background: #795634;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 20px;
            text-decoration: none;

        }
    </style>


</head>


<body>


    <div class="pet-container">


        @foreach($hewan as $pet)


            <div class="pet-card">


                <img src="{{ asset('storage/' . $pet->foto) }}">


                <div class="pet-content">


                    <span class="category">
                        {{ $pet->jenis }}
                    </span>



                    <div class="pet-name">

                        <h2>
                            {{ $pet->nama }}
                        </h2>


                        <span class="age">
                            {{ $pet->umur }} tahun
                        </span>


                    </div>



                    <p class="gender">
                        {{ $pet->jenis_kelamin }}
                    </p>



                    <div class="tags">


                        <span class="tag">
                            ceria
                        </span>


                        <span class="tag">
                            aktif
                        </span>


                        <span class="tag">
                            terlatih
                        </span>


                    </div>



                    <a href="#" class="btn">
                        Lihat Detail →
                    </a>



                </div>


            </div>



        @endforeach


    </div>


</body>

</html>