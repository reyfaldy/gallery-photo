<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $_SESSION['username'] ?>'s Album
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>

<body class="bg-[#2C3333]">
    <div class="flex flex-col">
        <header>
            <div class="flex justify-between items-center bg-[#2C3333] h-[7em] px-[12em]">
                <form action="/search_result.php" class="max-w-[480px] w-full px-4" required>
                    <div class="relative flex items-center">
                        <input type="text" placeholder="Go find something..." required
                            class="w-full h-12 text-white border-[2px] border-[#395B64] text-[0.875rem] te p-4 rounded-full transition duration-[0.2s] bg-transparent hover:bg-[#353e3e] focus:outline-none focus:border-[#A5C9CA] focus:bg-[#434846] focus:placeholder-transparent ">
                        <button type="submit" class="">
                            <svg class="fill-[#A5C9CA] h-4 w-4 absolute top-4 right-4"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.1" x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </form>
                <div class="flex gap-[4em]">
                    <div class="group relative cursor-pointer">
                        <div class="flex items-center space-x-4">
                            <a
                                class="menu-hover py-[1em] text-[0.875rem] text-[#E7F6F2] hover:text-[#a6b1ae] transition duration-[0.2s]">
                                Your Collections
                            </a>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="h-5 w-4 text-[#E7F6F2]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </div>
                        <div
                            class="invisible absolute flex w-full flex-col rounded-md border-2 border-[#395B64] group-hover:visible">
                            <a href="./collections.php?id_user=<?= $_SESSION['id_user'] ?>"
                                class="py-[0.5em] text-[0.875rem] text-[#E7F6F2] hover:text-[#a6b1ae] hover:bg-[#353e3e] md:px-2 transition duration-[0.2s]">
                                Collections Page
                            </a>
                            <hr class="border-[#395B64]">
                            <a href="./form_album_create.php"
                                class="py-[0.5em] text-[0.875rem] text-[#E7F6F2] hover:text-[#a6b1ae] hover:bg-[#353e3e] md:px-2 transition duration-[0.2s]">
                                Create Album
                            </a>
                            <a href="./form_photo_upload.php"
                                class="py-[0.5em] text-[0.875rem] text-[#E7F6F2] hover:text-[#a6b1ae] hover:bg-[#353e3e] md:px-2 transition duration-[0.2s]">
                                Upload Photo
                            </a>
                        </div>
                    </div>
                    <button class="text-[#E7F6F2] text-[0.875rem] hover:text-[#a6b1ae] transition duration-[0.2s]"><a
                            href="./home.php">Home</a></button>
                    <button class="text-[#E7F6F2] text-[0.875rem] hover:text-[#a6b1ae] transition duration-[0.2s]"><a
                            href="./profile.php">Profile</a></button>
                </div>
            </div>
        </header>
        <main class="flex justify-center bg-[#2C3333]">
            <div class="mb-[3em] flex flex-col items-center bg-[#2C3333] w-[80%]">
                <h1 class="mt-[1em] text-[3em] text-[#E7F6F2]"><b>
                        <a href="./profile_user.php?id_user=<?= $_SESSION['id_user'] ?>">
                            <?= $_SESSION['username'] ?>
                        </a>
                    </b>'s Collections</h1>
                <br>
                <br>
                <h1 class="text-[2em] font-semibold text-[#E7F6F2]">Albums</h1>
                <div class="flex flex-wrap justify-center gap-[1em] mt-[1em]">
                    <?php
                    include('connection.php');
                    $id_user = $_SESSION['id_user'];
                    //Query untuk menampilkan album dari user
                    $sql = mysqli_query($conn, "SELECT * FROM album WHERE id_user = '$id_user'");
                    //Jika tidak ada maka tampilkan text
                    if ($sql->num_rows == 0) {
                        echo '<h1 class="text-[#E7F6F2] italic">You have no albums</h1>';
                    //Jika ada maka tampilkan album
                    } else {
                        //Looping untuk menampilkan album
                        while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <div class="p-4"><a
                                    href="./detail_album.php?id_album=<?= $row['id_album'] ?>?id_user=<?= $row['id_user'] ?>">
                                    <label class="text-[#E7F6F2] italic">
                                        <?= $row['album_name'] ?>
                                    </label>
                                    <img src="./image-folder.png" alt="image-folder"
                                        class="w-[250px] h-[250px] text-[#E7F6F2] cursor-pointer hover:scale-105 transition duration-[0.2s] object-cover">
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <br>
                <br>
                <h1 class="text-[2em] font-semibold text-[#E7F6F2]">Photos</h1>
                <div class="flex flex-wrap justify-center gap-[1em] mt-[1em]">
                    <?php
                    include('connection.php');
                    $id_user = $_SESSION['id_user'];
                    //Query untuk menampilkan photo dari user
                    $sql = mysqli_query($conn, "SELECT * FROM photo WHERE id_user = '$id_user'");
                    //Jika tidak ada tampilkan text
                    if (mysqli_num_rows($sql) == 0) {
                        echo '<label class="text-[#E7F6F2] italic">No photos</label>';
                    //Jika ada tampilkan photo
                    } else {
                        //Looping untuk menampilkan photo
                        while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <div class="p-4 hover:scale-105 transition duration-[0.2s]"><a
                                    href="./detail_photo.php?id_photo=<?= $row['id_photo'] ?>?id_user=<?= $row['id_user'] ?>">
                                    <label class="text-[#E7F6F2] italic">
                                        <?= $row['title_photo'] ?>
                                    </label>
                                    <img src="<?= $row['file_path'] ?>" alt="photo"
                                        class="w-[15em] h-[15em] object-cover rounded-md border-2 border-[#395B64] hover:border-[#E7F6F2] transition duration-[0.2s]">
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
</body>

</html>