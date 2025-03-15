<?php
class SelfDestructPassword
{
    private $passwords = [];
    private $file = "passwords.json";

    public function __construct()
    {
        if (file_exists($this->file)) {
            $this->passwords = json_decode(file_get_contents($this->file), true);
        }
    }

    // Yangi parol yaratish (faqat bitta foydalanish mumkin)
    public function generatePassword($user)
    {
        $password = bin2hex(random_bytes(8)); // Tasodifiy parol
        $this->passwords[$user] = password_hash($password, PASSWORD_BCRYPT);
        file_put_contents($this->file, json_encode($this->passwords));
        return $password;
    }

    // Parolni tekshirish va ishlatilgandan keyin uni o‘chirish
    public function verifyPassword($user, $inputPassword)
    {
        if (isset($this->passwords[$user]) && password_verify($inputPassword, $this->passwords[$user])) {
            unset($this->passwords[$user]); // Parolni o‘chirish
            file_put_contents($this->file, json_encode($this->passwords));
            return "✅ Parol to‘g‘ri! Endi bu parol ishlamaydi.";
        }
        return "❌ Noto‘g‘ri parol yoki allaqachon ishlatilgan.";
    }
}

// Misol:
$auth = new SelfDestructPassword();

// Foydalanuvchi uchun yangi parol yaratish
$newPassword = $auth->generatePassword("user1");
echo "Yangi parol: " . $newPassword . "\n";

// Parolni tekshirish
echo $auth->verifyPassword("user1", $newPassword) . "\n"; // To‘g‘ri
echo $auth->verifyPassword("user1", $newPassword) . "\n"; // Xatolik, chunki parol o‘chirilgan
?>


<!-- Kod qanday ishlaydi?
    generatePassword($user) – faqat bitta foydalanish uchun parol yaratadi.
    verifyPassword($user, $inputPassword) – parolni tekshiradi va ishlatilgandan keyin o‘chiradi.
    Har safar ishlatilganda parol avtomatik o‘chadi, shu sababli bir marta ishlatiladigan maxfiy kodlar kabi ishlaydi.
    Bu yondashuv bir martalik parollar, maxfiy linklar, yoki xavfsiz autentifikatsiya tizimlari uchun foydali bo‘lishi mumkin.
 -->