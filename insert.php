<?php
include('conatact.php');
$english = isset($_POST['english']) ? 1 : 0;
$arabic = isset($_POST['arabic']) ? 1 : 0;
$package           =       mysqli_real_escape_string($conn,$_POST['package']);
$design            =       mysqli_real_escape_string($conn,$_POST['design']);          
$typeOccasion      =       mysqli_real_escape_string($conn,$_POST['typeOccasion']);                       
$eventType         =       mysqli_real_escape_string($conn,$_POST['eventType']);            
$nickName          =       mysqli_real_escape_string($conn,$_POST['nickname']); 
$eventDate         =       mysqli_real_escape_string($conn,$_POST['eventDate']);   

// استخراج محتوى المحررات النصية
$greetingText      =       mysqli_real_escape_string($conn,$_POST['editorGreeting'] ?? '');    
$organizerCount    =       mysqli_real_escape_string($conn,$_POST['organizerCount'] ?? '');
$organizerName1    =       mysqli_real_escape_string($conn,$_POST['organizerName1'] ?? '');   
$organizerName2    =       mysqli_real_escape_string($conn,$_POST['organizerName2'] ?? '');   
$phrasesText       =       mysqli_real_escape_string($conn,$_POST['editorPhrases'] ?? '');    
$fullOrganizerName =       mysqli_real_escape_string($conn,$_POST['fullOrganizerName'] ?? '');  

// معلومات العنوان والخريطة
$addressText       =       mysqli_real_escape_string($conn,$_POST['editorAddress'] ?? '');
$mapsLink          =       mysqli_real_escape_string($conn,$_POST['mapsLink'] ?? '');

// معلومات البرنامج والمعلومات الإضافية
$programmeText     =       mysqli_real_escape_string($conn,$_POST['editorProgramme'] ?? '');
$additionalInfoText =      mysqli_real_escape_string($conn,$_POST['editorAdditionalInfo'] ?? '');

// معلومات RSVP
$DeadlineRSVP      =       mysqli_real_escape_string($conn,$_POST['DeadlineRSVP'] ?? '');
$MaxPax            =       mysqli_real_escape_string($conn,$_POST['MaxPax'] ?? '');
$TotalGuests       =       mysqli_real_escape_string($conn,$_POST['TotalGuests'] ?? '');

// معلومات جهات الاتصال
$contactName1      =       mysqli_real_escape_string($conn,$_POST['contactName1'] ?? '');
$contactRelation1  =       mysqli_real_escape_string($conn,$_POST['contactRelation1'] ?? '');
$contactNum1       =       mysqli_real_escape_string($conn,$_POST['contactNum1'] ?? '');
$contactWhats1     =       isset($_POST['contactWhats1']) ? 1 : 0;
$contactName2      =       mysqli_real_escape_string($conn,$_POST['contactName2'] ?? '');
$contactRelation2  =       mysqli_real_escape_string($conn,$_POST['contactRelation2'] ?? '');
$contactNum2       =       mysqli_real_escape_string($conn,$_POST['contactNum2'] ?? '');
$contactWhats2     =       isset($_POST['contactWhats2']) ? 1 : 0;

// معلومات الأغنية والتمرير التلقائي
$youtubeLink       =       mysqli_real_escape_string($conn,$_POST['youtubeLink'] ?? '');
$startTime         =       mysqli_real_escape_string($conn,$_POST['startTime'] ?? '');
$autoPlay          =       isset($_POST['autoPlay']) ? 1 : 0;

// إعدادات العرض
$showVenue         =       isset($_POST['showVenue']) ? 1 : 0;
$showDate          =       isset($_POST['showDate']) ? 1 : 0;
$showTime          =       isset($_POST['showTime']) ? 1 : 0;
$showTimeEnd       =       isset($_POST['showTimeEnd']) ? 1 : 0;
$showProgramme     =       isset($_POST['showProgramme']) ? 1 : 0;
$countdown         =       isset($_POST['countdown']) ? 1 : 0;
$saveDate          =       isset($_POST['saveDate']) ? 1 : 0;
$dressCode         =       isset($_POST['dressCode']) ? 1 : 0;
$dressCodeInput    =       mysqli_real_escape_string($conn,$_POST['dressCodeInput'] ?? '');

$insert = "INSERT INTO cards (
    english, arabic, package, design, typeOccasion, eventType, nickName, eventDate,
    greetingText, organizerCount, organizerName1, organizerName2, phrasesText, fullOrganizerName,
    addressText, mapsLink, programmeText, additionalInfoText,
    DeadlineRSVP, MaxPax, TotalGuests,
    contactName1, contactRelation1, contactNum1, contactWhats1,
    contactName2, contactRelation2, contactNum2, contactWhats2,
    youtubeLink, startTime, autoPlay, 
    showVenue, showDate, showTime, showTimeEnd, showProgramme, 
    countdown, saveDate, dressCode, dressCodeInput
) VALUES (
    '$english', '$arabic', '$package', '$design', '$typeOccasion', '$eventType', '$nickName', '$eventDate',
    '$greetingText', '$organizerCount', '$organizerName1', '$organizerName2', '$phrasesText', '$fullOrganizerName',
    '$addressText', '$mapsLink', '$programmeText', '$additionalInfoText',
    '$DeadlineRSVP', '$MaxPax', '$TotalGuests',
    '$contactName1', '$contactRelation1', '$contactNum1', '$contactWhats1',
    '$contactName2', '$contactRelation2', '$contactNum2', '$contactWhats2',
    '$youtubeLink', '$startTime', '$autoPlay',
    '$showVenue', '$showDate', '$showTime', '$showTimeEnd', '$showProgramme',
    '$countdown', '$saveDate', '$dressCode', '$dressCodeInput'
)";

if(mysqli_query($conn,$insert))
{
    echo "تم إنشاء البطاقة بنجاح";
}
else 
{
    echo "حدث خطأ أثناء إنشاء البطاقة: " . mysqli_error($conn);
}

?>