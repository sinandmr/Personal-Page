<?php
include '../config.php';
if(!$_SESSION['admin_kadi']){
    header("Location: giris.php");
}


#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------


// ADMİN GİRİŞ BAŞLANGIÇ

if(isset($_POST['admingiris'])){

    $admin_kadi = htmlspecialchars(trim($_POST['admin_kadi']));
    $admin_sifre = htmlspecialchars(trim($_POST['admin_sifre']));

    if(!$admin_kadi || !$admin_sifre){
        header("Location: giris.php?islem=bos");
    }else{

        $sorgu = $db->prepare("SELECT * FROM admin WHERE admin_kadi=? AND admin_sifre=?");
        $sorgu->execute(array($admin_kadi,$admin_sifre));
        $admingiris = $sorgu->fetch(PDO::FETCH_OBJ);

        if($admingiris){
            $_SESSION['giris'] = true;
            $_SESSION['admin_kadi'] = $admingiris->admin_kadi;
            $_SESSION['admin_id'] = $admingiris->admin_id;
            header("Location: index.php");
        }else{
            header("location: giris.php?islem=no");
        }
    }

}

// ADMİN GİRİŞ BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// ADMİN KAYIT BAŞLANGIÇ
// Bu kısım pasif halde.

if(isset($_POST['adminkayit'])){

    $admin_kadi = $_POST['admin_kadi'];
    $admin_sifre = $_POST['admin_sifre'];

    if(!$admin_kadi || !$admin_sifre){
        header("Location: kayit.php?kayit=bos");
    }else{
        $adminkayityap = $db->prepare("INSERT INTO admin(admin_kadi,admin_sifre) VALUE (?,?)");
        $adminkayityap->execute(array($admin_kadi,$admin_sifre));
        if($adminkayityap){
            header("Location: kayit.php?kayit=yes");
        }else{
            header("Location: kayit.php?kayit=no");
        }

    }

}

// ADMİN KAYIT BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// ADMİN BİLGİ GÜNCELLE BAŞLANGIÇ

if(isset($_POST['adminguncelle'])){

    $guncelleid =  $_SESSION['admin_id'];
    $admin_kadi = $_POST['admin_kadi'];
    $admin_sifre = $_POST['admin_sifre'];

    if(!$admin_kadi || !$admin_sifre){
        header("Location: profil.php?guncelle=bos");
    }else{
        $adminguncelle = $db->prepare("UPDATE admin SET  admin_kadi=?, admin_sifre=? WHERE admin_id=?");
        $adminguncelle->execute(array($admin_kadi,$admin_sifre,$guncelleid));
        if($adminguncelle){
            header("Location: profil.php?guncelle=yes");
        }else{
            header("Location: profil.php?guncelle=no");
        }

    }

}

// ADMİN BİLGİ GÜNCELLE BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// GENEL AYARLARI GÜNCELLEME BÖLÜMÜ BAŞLANGIÇ

if(isset($_POST['genel-ayarlar'])){

    $site_title     = $_POST['site_title'];
    $site_url       = $_POST['site_url'];
    $site_keyw      = $_POST['site_keyw'];
    $site_desc      = $_POST['site_desc'];
    $site_footer    = $_POST['site_footer'];

# Hiçbiri boş olarak gelmesin. o yüzden şöyle yapalım

    if(!$site_title || !$site_url || !$site_keyw || !$site_desc || !$site_footer){
        header("Location: genel-ayarlar.php?ayar-guncelle=bos");
    }else{

        $guncelleayarlar = $db->prepare("UPDATE ayarlar SET site_title=?, site_url=?, site_keyw=?, site_desc=?, site_footer=? WHERE site_id=1");
        $guncelleayarlar->execute(array($site_title,$site_url,$site_keyw,$site_desc,$site_footer));
        if($guncelleayarlar){
            header("Location: genel-ayarlar.php?ayar-guncelle=yes");
        }else{
            header("Location: genel-ayarlar.php?ayar-guncelle=no");
        }

    }
}
// GENEL AYARLARI GÜNCELLEME BÖLÜMÜ BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// BİLGİLERİM GÜNCELLEME BÖLÜMÜ BAŞLANGIÇ

if(isset($_POST['bilgilerim'])){

    $bilgi_fotograf = $_POST['bilgi_fotoğraf'];
    $bilgi_isim     = $_POST['bilgi_isim'];
    $bilgi_meslek   = $_POST['bilgi_meslek'];
    $bilgi_ikamet   = $_POST['bilgi_ikamet'];
    $bilgi_mail     = $_POST['bilgi_mail'];
    $bilgi_telefon  = $_POST['bilgi_telefon'];
    $bilgi_skype    = $_POST['bilgi_skype'];

# HİÇBİRİNİ BOŞ OLARAK KABUL ETMEYELİM
    if(!$bilgi_fotograf || !$bilgi_isim || !$bilgi_meslek || !$bilgi_ikamet || !$bilgi_mail || !$bilgi_telefon || !$bilgi_skype){
        header("Location: bilgilerim.php?bilgi-guncelle=bos");
    }else{
        $bilgiguncelle = $db->prepare("UPDATE bilgilerim SET bilgi_fotoğraf=?, bilgi_isim=?, bilgi_meslek=?, bilgi_ikamet=?, bilgi_mail=?, bilgi_telefon=?, bilgi_skype=? WHERE bilgi_id=1");
        $bilgiguncelle->execute(array($bilgi_fotograf,$bilgi_isim,$bilgi_meslek,$bilgi_ikamet,$bilgi_mail,$bilgi_telefon,$bilgi_skype));
        if($bilgiguncelle){
            header("Location: bilgilerim.php?bilgi-guncelle=yes");
        }else{
            header("Location: bilgilerim.php?bilgi-guncelle=no");
        }
    }


}
// BİLGİLERİM GÜNCELLEME BÖLÜMÜ BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// BECERİ SİLME KISMI BAŞLANGIÇ
if (isset($_GET['becerisilid'])) {
    $silinecekid = $_GET['becerisilid'];
    $sil = $db->prepare("DELETE FROM becerilerim WHERE beceri_id=?");
    $sil->execute(array($silinecekid));
    if($sil){
        header("Location: beceriler.php?sil=yes");
    }
}
// BECERİ SİLME KISMI BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// BECERİ DÜZENLEME KISMI BAŞLANGIÇ

if(isset($_POST['beceri-duzenle'])){

    $beceri_ad = $_POST['beceri_ad'];
    $beceri_yuzde = $_POST['beceri_yuzde'];
    $beceri_id = $_POST['beceri_id'];

    if(!$beceri_ad || !$beceri_yuzde || !$beceri_id) {

        header("Location: beceriler.php?beceri-guncelle=bos");
    }else{
        $becguncelle = $db->prepare("UPDATE becerilerim SET beceri_ad=?, beceri_yuzde=? WHERE beceri_id=?");
        $becguncelle->execute(array($beceri_ad,$beceri_yuzde,$beceri_id));
        if($becguncelle){
            header("Location: beceriler.php?duzenle=yes");
        }else{
            header("Location: beceriler.php?duzenle=no");
        }
    }

}
// BECERİ DÜZENLEME KISMI BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// DİL SİLME KISMI BAŞLANGIÇ
if (isset($_GET['dilsilid'])) {
    $silinecekid = $_GET['dilsilid'];
    $sil = $db->prepare("DELETE FROM dil WHERE dil_id=?");
    $sil->execute(array($silinecekid));
    if($sil){
        header("Location: diller.php?sil=yes");
    }
}
// DİL SİLME KISMI BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// DİL DÜZENLEME KISMI BAŞLANGIÇ

if(isset($_POST['dil-duzenle'])){

    $dil_ad = $_POST['dil_ad'];
    $dil_yuzde = $_POST['dil_yuzde'];
    $dil_id = $_POST['dil_id'];

    if(!$dil_ad || !$dil_yuzde || $dil_id){

        $dilguncelle = $db->prepare("UPDATE dil SET dil_ad=?, dil_yuzde=? WHERE dil_id=?");
        $dilguncelle->execute(array($dil_ad,$dil_yuzde,$dil_id));
        if($dilguncelle){
            header("Location: diller.php?duzenle=yes");
        }else{
            header("Location: diller.php?duzenle=no");
        }
    }

}
// DİL DÜZENLEME KISMI BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// İŞ DÜZENLEME KISMI BAŞLANGIÇ

if(isset($_POST['is-duzenle'])){

    $is_ad        = $_POST['is_ad'];
    $is_kurum     = $_POST['is_kurum'];
    $is_aciklama  = $_POST['is_aciklama'];
    $is_tarih     = $_POST['is_tarih'];
    $is_devam     = $_POST['is_devam'];
    $is_id        = $_POST['is_id'];



    if(!$is_ad || !$is_kurum || !$is_aciklama || !$is_tarih || !$is_devam || !$is_id) {

        header("Location: isler.php?is-guncelle=bos");
    } else {

        $isguncelle = $db->prepare("UPDATE isler SET is_ad=?, is_kurum=?, is_aciklama=?, is_tarih=?, is_devam=? WHERE is_id=?");
        $isguncelle->execute(array($is_ad,$is_kurum,$is_aciklama,$is_tarih,$is_devam,$is_id));
        if($isguncelle){
            header("Location: isler.php?duzenle=yes");
        }else{
            header("Location: isler.php?duzenle=no");
        }
    }
}

// İŞ DÜZENLEME KISMI BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// İŞ SİLME KISMI BAŞLANGIÇ
if (isset($_GET['issilid'])) {
    $silinecekid = $_GET['issilid'];
    $sil = $db->prepare("DELETE FROM isler WHERE is_id=?");
    $sil->execute(array($silinecekid));
    if($sil){
        header("Location: isler.php?sil=yes");
    }
}
// İŞ SİLME KISMI BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// OKUL DÜZENLEME KISMI BAŞLANGIÇ

if(isset($_POST['okul-duzenle'])){

    $okul_ad         = $_POST['okul_ad'];
    $okul_aciklama   = $_POST['okul_aciklama'];
    $okul_tarih      = $_POST['okul_tarih'];
    $okul_devam      = $_POST['okul_devam'];
    $okul_id         = $_POST['okul_id'];



    if(!$okul_ad || !$okul_aciklama || !$okul_tarih || !$okul_devam || !$okul_id) {

        header("Location: okullar.php?okul-guncelle=bos");
    } else {

        $okulguncelle = $db->prepare("UPDATE okul SET okul_ad=?, okul_aciklama=?, okul_tarih=?, okul_devam=? WHERE okul_id=?");
        $okulguncelle->execute(array($okul_ad,$okul_aciklama,$okul_tarih,$okul_devam,$okul_id));
        if($okulguncelle){
            header("Location: okullar.php?duzenle=yes");
        }else{
            header("Location: okullar.php?duzenle=no");
        }
    }
}

// OKUL DÜZENLEME KISMI BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// OKUL SİLME KISMI BAŞLANGIÇ

if (isset($_GET['okulsilid'])) {
    $silinecekid = $_GET['okulsilid'];
    $sil = $db->prepare("DELETE FROM okul WHERE okul_id=?");
    $sil->execute(array($silinecekid));
    if($sil){
        header("Location: okullar.php?sil=yes");
    }
}

// OKUL SİLME KISMI BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------

// SOSYAL MEDYA GÜNCELLEME BÖLÜMÜ BAŞLANGIÇ

if(isset($_POST['sosyal-medya'])){

        $sm_facebook      = $_POST['sm_facebook'];
        $sm_twitter       = $_POST['sm_twitter'];
        $sm_instagram     = $_POST['sm_instagram'];
        $sm_youtube       = $_POST['sm_youtube'];
        $sm_google        = $_POST['sm_google'];
        $sm_pinterest     = $_POST['sm_pinterest'];
        $sm_linkedin      = $_POST['sm_linkedin'];
        $sm_snapchat      = $_POST['sm_snapchat'];

        $guncellesosyal = $db->prepare("UPDATE sosyalmedya SET sm_facebook=?, sm_twitter=?, sm_instagram=?, sm_youtube=?, sm_google=?, sm_pinterest=?, sm_linkedin=?, sm_snapchat=?  WHERE sm_id=1");
        $guncellesosyal->execute(array($sm_facebook,$sm_twitter,$sm_instagram,$sm_youtube,$sm_google,$sm_pinterest,$sm_linkedin,$sm_snapchat));
        if($guncellesosyal){
            header("Location: sosyal.php?sosyal-guncelle=yes");
        }else{
            header("Location: sosyal.php?sosyal-guncelle=no");
        }
    }
// SOSYAL MEDYA GÜNCELLEME BÖLÜMÜ BİTİŞ

#------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------
