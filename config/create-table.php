<?php
include "koneksi.php";

$sqlTabelAdmin = "create table admin (
        id_admin int(11) auto_increment not null primary key,
        username varchar(30) not null,
        password varchar (40) not null unique
        )";

if ($kon->query($sqlTabelAdmin) === TRUE) {
    echo "Table Admin berhasil dibuat";
} else {
    echo "Table Admin gagal dibuat";
}

$sqlTabelKegiatan = "create table kegiatan (
        id_kgt int(11) auto_increment not null primary key,
        nama_kegiatan varchar(30) not null,
        tgl_kegiatan date not null,
        waktu time not null,
        jenis_kegiatan enum('Ibadah','Keakraban','Bakti Sosial') not null,
        catatan text not null,
        latitude float(10,6) not null,
        longitude float(10,6) not null,
        `created_at` timestamp,
        colapse varchar(10) NOT NULL,
        id_admin int(11) not null,


        CONSTRAINT FOREIGN KEY (id_admin) REFERENCES admin (id_admin) ON DELETE RESTRICT ON UPDATE CASCADE
        )";

if ($kon->query($sqlTabelKegiatan) === TRUE) {
    echo "Table Kegiatan berhasil dibuat";
} else {
    echo "Table Kegiatan gagal dibuat";
}

$sqlTabelArtikel = "create table artikel (
    id_artkl int(11) auto_increment NOT NULL primary key,
    judul varchar(30) NOT NULL,
    isi_artikel text NOT NULL,
    tgl_artikel date NOT NULL,
    gambar varchar(200) NOT NULL,
    `created_at` timestamp,
    colapse varchar(10) NOT NULL,
    id_admin int(11) not null,


    CONSTRAINT FOREIGN KEY (id_admin) REFERENCES admin (id_admin) ON DELETE RESTRICT ON UPDATE CASCADE
    )";

if ($kon->query($sqlTabelArtikel) === TRUE) {
    echo "Table Artikel berhasil dibuat";
} else {
    echo "Table Artikel gagal dibuat";
}

$sqlTabelKomentar = "create table if not exists komentar (
    id int(11) NOT NULL AUTO_INCREMENT primary key,
    nama_pengirim varchar(30) NOT NULL,
    isi_komentar text NOT NULL,
    `created_at` timestamp,
    id_kgt int(11) NOT NULL,

    CONSTRAINT FOREIGN KEY (id_kgt) REFERENCES kegiatan (id_kgt) ON DELETE RESTRICT ON UPDATE CASCADE
    )";

if ($kon->query($sqlTabelKomentar) === TRUE) {
    echo "Table Komentar berhasil dibuat";
} else {
    echo "Table Komentar gagal dibuat";
}
