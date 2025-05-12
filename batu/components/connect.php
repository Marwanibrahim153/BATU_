<?php
$host = 'localhost'; // أو عنوان الخادم إذا كنت تستخدم خادماً عن بُعد
$dbname = 'db'; // اسم قاعدة البيانات الخاصة بك
$username = 'root'; // اسم المستخدم لقاعدة البيانات (عادةً يكون 'root' في بيئات التطوير)
$password = ''; // كلمة المرور لقاعدة البيانات (يمكن أن تكون فارغة في بيئات التطوير)

try {
    // إنشاء اتصال بـ PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // ضبط PDO ليرمي استثناء في حال حدوث أخطاء
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // إذا تم الاتصال بنجاح
    // echo "Connected successfully"; 
} catch(PDOException $e) {
    // إذا حدث خطأ في الاتصال
    echo "Connection failed: " . $e->getMessage();
}
?>
