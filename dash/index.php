<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Card</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
  <form id="cardForm" action="insert.php" method="POST">
<div class="container">
   <section class="forms">
   
    <div class="container">
   
    <section class="forms">
        <div class="form active" id="form1">
        <h1>Edit Card</h1>
        <p>Main & Opening</p>
            <div>
            <label for="cardLanguage">Card Language:</label>
              <input type="checkbox" name="english" id="english" /> English
              <input type="checkbox" name="arabic" id="arabic" /> Arabic
        </div>
        <div>
            <label for="package"> Package</label>
            <select id="package" name="package">
                <option value="gold">Gold (RM60)</option>
                <option value="silver">Silver (RM40)</option>
                <option value="bronze">Bronze (RM30)</option>
              </select>
            </div>
            <div>
          
       <?php
include('conatact.php'); // تأكد أن اسم الملف صحيح
$result = mysqli_query($conn, "SELECT * FROM design"); // تأكد أن اسم الجدول صحيح
?>

<label for="design">Design Code</label>
<select id="design" name="design">
    <option disabled selected>اختر تصميمًا</option>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $designCode = htmlspecialchars($row['name']); // أو أي عمود آخر يمثل الكود
        echo "<option value='$designCode'>$designCode</option>";
    }
    ?>
</select>

            </div>
         
          <div>
                <label for="typeOccasion"> Type of occasion</label>
<select id="typeOccasion" name="typeOccasion">
  <option value="Weddings">Weddings</option>
  <option value="birthdays">birthdays</option>
  <option value="Baby shower">Baby shower</option>
  <option value="Henna Night">Henna Night</option>
  <option value="Engagement">Engagement</option>
</select>
            </div>
            <div class="nav-buttons">
                <button type="button" class="arrow-btn" onclick="nextForm()">→</button>
                <h2 class="stepTitle">1. Main & Opening</h2>
              </div>
        </div>
        
        <div class="form" id="form2">
            <h1>Edit Card</h1>
        <p>Cover Page</p>
        <div>
        <label for="eventType">Event Type:</label>
        <input type="text" id="eventType" name="eventType" placeholder="Walimatul Urus" oninput="updatePreview()"/>
         </div>
         <div>
            <label for="nickname"> Nickname:</label>
            <input type="text" id="nickName" name="nickName" placeholder="Ahmed & Sara" oninput="updatePreview()"/>
         </div>
         <div>
            <label for="eventDate">Day & Date:</label>
          <input type="text" id="eventDate" name="eventDate" oninput="updatePreview()"/>
         </div>
            <div class="nav-buttons">
              <button type="button" class="arrow-btn" onclick="prevForm()">←</button>
              <button type="button" class="arrow-btn2" onclick="nextForm()">→</button>
            </div>
          </div>
          
          <div class="form" id="form3">
            <h1>Edit Card</h1>
        <p>Invitation Text</p>
        <div>
            <label for="Greeting"> Greeting:</label>
            <div class="editor-container">
                <div class="toolbar">
                  <button type="button" onclick="format('bold','editorGreeting')"><i class='bx bx-bold'></i></button>
                  <button type="button" onclick="format('italic','editorGreeting')"><i class='bx bx-italic'></i></button>
                  <button type="button" onclick="format('underline','editorGreeting')"><i class='bx bx-underline'></i></button>
                  <button type="button" onclick="format('justifyRight','editorGreeting')"><i class='bx bx-align-right'></i></button> 
                  <button type="button" onclick="format('justifyCenter','editorGreeting')"><i class='bx bx-align-justify'></i>;</button> 
                  <button type="button" onclick="format('justifyLeft','editorGreeting')"><i class='bx bx-align-left'></i></button> 
                  <select onchange="changeFontSize(this.value,'editorGreeting')">
                    <option value="1">10px</option>
                    <option value="2">13px</option>
                    <option value="3">16px</option>
                    <option value="4">18px</option>
                  </select>
                  <select onchange="changeFont(this.value,'editorGreeting')">
                    <option value="Default">Default</option>
                    <option value="Arial">Arial</option>
                    <option value="Tahoma">Tahoma</option>
                  </select>
                </div>
                <div id="editorGreeting" class="content" contenteditable="true" placeholder="" oninput="updatePreview()">
                  مرحباً بكم
                </div>
                <input type="hidden" id="greetingText" name="greetingText">
              </div>
            </div>
            <div>
                <label for="organizerName">Organizer's Name (Optional):</label>
             <input type="text" id="organizerName" name="organizerName" oninput="updatePreview()"/>
            </div>
            <div>
                <label for="Phrases"> Phrases:</label>
                <div class="editor-container">
                    <div class="toolbar">
                      <button type="button" onclick="format('bold','editorPhrases')"><i class='bx bx-bold'></i></button>
                      <button type="button" onclick="format('italic','editorPhrases')"><i class='bx bx-italic'></i></button>
                      <button type="button" onclick="format('underline','editorPhrases')"><i class='bx bx-underline'></i></button>
                      <button type="button" onclick="format('justifyRight','editorPhrases')"><i class='bx bx-align-right'></i></button> 
                      <button type="button" onclick="format('justifyCenter','editorPhrases')"><i class='bx bx-align-justify'></i>;</button> 
                      <button type="button" onclick="format('justifyLeft','editorPhrases')"><i class='bx bx-align-left'></i></button> 
                      <select onchange="changeFontSize(this.value,'editorPhrases')">
                        <option value="1">10px</option>
                        <option value="2">13px</option>
                        <option value="3">16px</option>
                        <option value="4">18px</option>
                      </select>
                      <select onchange="changeFont(this.value,'editorPhrases')">
                        <option value="Default">Default</option>
                        <option value="Arial">Arial</option>
                        <option value="Tahoma">Tahoma</option>
                      </select>
                    </div>
                    <div id="editorPhrases" class="content" contenteditable="true" placeholder="اكتب تحيتك هنا..." oninput="updatePreview()">
                        Cordially invite 
                        Dato' | Datin | Mr. | Mrs. | Ms.
                        to the wedding reception of our son and daughter
                    </div>
                    <input type="hidden" id="phrasesText" name="phrasesText">
                  </div>
                </div>
                <div>
                    <label for="fullName">Full Name (Optional):</label>
                 <input type="text" id="fullOrganizerName" name="fullOrganizerName" oninput="updatePreview()"/>
                </div>
            <div class="nav-buttons">
              <button type="button" class="arrow-btn" onclick="prevForm()">←</button>
              <button type="button" class="arrow-btn2" onclick="nextForm()">→</button>
            </div>
          </div>
          
          <div class="form" id="form4">
            <h1>Edit Card</h1>
            <p>Venue & Navigation</p>
            <div>
                <label for="higriDate">Hijri Date (Optional):</label>
             <input type="text" id="higriDate" name="higriDate" oninput="updatePreview()"/>
            </div>
            <div>
                <label for="address"> Address:</label>
                <div class="editor-container">
                    <div class="toolbar">
                      <button type="button" onclick="format('bold','editorAddress')"><i class='bx bx-bold'></i></button>
                      <button type="button" onclick="format('italic','editorAddress')"><i class='bx bx-italic'></i></button>
                      <button type="button" onclick="format('underline','editorAddress')"><i class='bx bx-underline'></i></button>
                      <button type="button" onclick="format('justifyRight','editorAddress')"><i class='bx bx-align-right'></i></button> 
                      <button type="button" onclick="format('justifyCenter','editorAddress')"><i class='bx bx-align-justify'></i>;</button> 
                      <button type="button" onclick="format('justifyLeft','editorAddress')"><i class='bx bx-align-left'></i></button>  
                      <select onchange="changeFontSize(this.value,'editorAddress')">
                        <option value="1">10px</option>
                        <option value="2">13px</option>
                        <option value="3">16px</option>
                        <option value="4">18px</option>
                      </select>
                      <select onchange="changeFont(this.value,'editorAddress')">
                        <option value="Default">Default</option>
                        <option value="Arial">Arial</option>
                        <option value="Tahoma">Tahoma</option>
                      </select>
                    </div>
                    <div id="editorAddress" class="content" contenteditable="true" placeholder="اكتب تحيتك هنا..." oninput="updatePreview()">
                      مرحباً بكم
                    </div>
                    <input type="hidden" id="addressText" name="addressText">
                  </div>
                </div>
                <div>
                    <label for="mapsLink">Google Maps Link:</label>
                    <input type="url" id="mapsLink" name="mapsLink" placeholder="https://maps.google.com/..." oninput="updateMapPreview()"/>
                </div>
          <div class="nav-buttons">
              <button type="button" class="arrow-btn" onclick="prevForm()">←</button>
              <button type="button" class="arrow-btn2" onclick="nextForm()">→</button>
            </div>
          </div>
          
          <div class="form" id="form5">
            <h1>Edit Card</h1>
            <p>Programme & Add .Info</p>
            <div>
                <label for="Programme"> Programme:</label>
                <div class="editor-container">
                    <div class="toolbar">
                      <button type="button" onclick="format('bold','editorProgramme')"><i class='bx bx-bold'></i></button>
                      <button type="button" onclick="format('italic','editorProgramme')"><i class='bx bx-italic'></i></button>
                      <button type="button" onclick="format('underline','editorProgramme')"><i class='bx bx-underline'></i></button>
                      <button type="button" onclick="format('justifyRight','editorProgramme')"><i class='bx bx-align-right'></i></button> 
                      <button type="button" onclick="format('justifyCenter','editorProgramme')"><i class='bx bx-align-justify'></i>;</button> 
                      <button type="button" onclick="format('justifyLeft','editorProgramme')"><i class='bx bx-align-left'></i></button> 
                      <select onchange="changeFontSize(this.value,'editorProgramme')">
                        <option value="1">10px</option>
                        <option value="2">13px</option>
                        <option value="3">16px</option>
                        <option value="4">18px</option>
                      </select>
                      <select onchange="changeFont(this.value,'editorProgramme')">
                        <option value="Default">Default</option>
                        <option value="Arial">Arial</option>
                        <option value="Tahoma">Tahoma</option>
                      </select>
                    </div>
                    <div id="editorProgramme" class="content" contenteditable="true" placeholder="اكتب تحيتك هنا..." oninput="updatePreview()">
                       Lunch : 11:00 am - 5:00 pm
                        The Arrival of Bride & Groom: 12.30 pm
                    </div>
                    <input type="hidden" id="programmeText" name="programmeText">
                  </div>
                </div>
                <div>
                    <label for="additonInformatiom"> Additon Informatiom:</label>
                    <div class="editor-container">
                        <div class="toolbar">
                          <button type="button" onclick="format('bold','editorAdditionalInfo')"><i class='bx bx-bold'></i></button>
                      <button type="button" onclick="format('italic','editorAdditionalInfo')"><i class='bx bx-italic'></i></button>
                      <button type="button" onclick="format('underline','editorAdditionalInfo')"><i class='bx bx-underline'></i></button>
                      <button type="button" onclick="format('justifyRight','editorAdditionalInfo')"><i class='bx bx-align-right'></i></button> 
                      <button type="button" onclick="format('justifyCenter','editorAdditionalInfo')"><i class='bx bx-align-justify'></i>;</button> 
                      <button type="button" onclick="format('justifyLeft','editorAdditionalInfo')"><i class='bx bx-align-left'></i></button> 
                          <select onchange="changeFontSize(this.value,'editorAdditionalInfo')">
                            <option value="1">10px</option>
                            <option value="2">13px</option>
                            <option value="3">16px</option>
                            <option value="4">18px</option>
                          </select>
                          <select onchange="changeFont(this.value,'editorAdditionalInfo')">
                            <option value="Default">Default</option>
                            <option value="Arial">Arial</option>
                            <option value="Tahoma">Tahoma</option>
                          </select>
                        </div>
                        <div id="editorAdditionalInfo" class="content" contenteditable="true" placeholder="اكتب تحيتك هنا..." oninput="updatePreview()">
                            ADAM HAWA
                        </div>
                        <input type="hidden" id="additionalInfoText" name="additionalInfoText">
                      </div>
                    </div>
            <div class="nav-buttons">
              <button type="button" class="arrow-btn" onclick="prevForm()">←</button>
              <button type="button" class="arrow-btn2" onclick="nextForm()">→</button>
            </div>
          </div>
          
          <div class="form" id="form6">
            <h1>EDIT CARD</h1>
            <p>Contacts</p>
            <div class="contact-block">
                <h3>Contact 1 (optional)</h3>
                <input type="text" id="contactName1" name="contactName1" placeholder="Ahmad" oninput="updatePreview()">
                <input type="text" id="contactRelation1" name="contactRelation1" placeholder="Hubungan/Relationship (optional)" oninput="updatePreview()">
                <input type="text" id="contactNum1" name="contactNum1" placeholder="0123456789" oninput="updateWhatsappPreview1()">
                <label class="toggle-label">
                  <input class="inputCheck" id="contactWhats1" name="contactWhats1" type="checkbox" onchange="updateWhatsappPreview1()">
                  <span class="slider"></span>
                  WhatsApp
                </label>
              </div>
              <div class="contact-block">
                <h3>Contact 2 (optional)</h3>
                <input type="text" id="contactName2" name="contactName2" placeholder="Nama/Nama" oninput="updatePreview()">
                <input type="text" id="contactRelation2" name="contactRelation2" placeholder="Hubungan/Relationship (optional)" oninput="updatePreview()">
                <input type="text" id="contactNum2" name="contactNum2" placeholder="Nombor Telefon/Phone Number" oninput="updateWhatsappPreview2()">
                <label class="toggle-label">
                  <input class="inputCheck" id="contactWhats2" name="contactWhats2" type="checkbox" onchange="updateWhatsappPreview2()">
                  <span class="slider"></span>
                  WhatsApp
                </label>
              </div>

            <div class="nav-buttons">
              <button type="button" class="arrow-btn" onclick="prevForm()">←</button>
              <button type="button" class="arrow-btn2" onclick="nextForm()">→</button>
            </div>
          </div>
          
          <div class="form" id="form7">
            <h1>Edit Card</h1>
            <p>Song & Autoscroll</p>
           
            <div>
              <label for="youtubeLink">YouTube Link for Song (optional):</label>
              <input
                type="url"
                id="youtubeLink"
                name="youtubeLink"
                placeholder="e.g. https://youtu.be/VIDEO_ID?t=19"
                onchange="updateMusicPreview()"
              />
            </div>
            
            <div>
              <label for="startTime">Start At (mm:ss):</label>
              <input
                type="text"
                id="startTime"
                name="startTime"
                placeholder="e.g. 00:19"
                onchange="updateMusicPreview()"
              />
              <button type="button" class="btnPlay" id="playPauseButton" disabled onclick="togglePlayPause()">
                <span>Play</span> <span><i class='bx bx-play'></i></span>
              </button>
            </div>
            
            <div>
              <label class="toggle-label">
                <input class="autoPlay" id="autoPlay" name="autoPlay" type="checkbox" onchange="updateMusicPreview()">
                <span class="slider"></span>
                AutoPlay
              </label>
            </div>

            <div class="nav-buttons">
                <button type="button" class="arrow-btn" onclick="prevForm()">←</button>
                <button type="button" class="arrow-btn2" onclick="nextForm()">→</button>
            </div>
          </div>
          
          <div class="form" id="form8">
            <h1>Edit Card</h1>
            <p>Segment & Finish</p>
            <div>
              <label class="toggle-label">
                <input class="inputCheck" type="checkbox" name="showVenue" id="showVenue">
                <span class="slider"></span>
                Venue
              </label>
            </div>
            <div>
              <label class="toggle-label">
                <input class="inputCheck" type="checkbox" name="showDate" id="showDate">
                <span class="slider"></span>
                Date
              </label>
            </div>
            <div>
              <label class="toggle-label">
                <input class="inputCheck" type="checkbox" name="showTime" id="showTime">
                <span class="slider"></span>
                Time
              </label>
            </div>
            <div>
              <label class="toggle-label">
                <input class="inputCheck" type="checkbox" name="showTimeEnd" id="showTimeEnd">
                <span class="slider"></span>
                Time End
              </label>
            </div>
            <div>
              <label class="toggle-label">
                <input class="inputCheck" type="checkbox" name="showSaveDate" id="showSaveDate">
                <span class="slider"></span>
                "Save The Date" Button
              </label>
            </div>
            <div>
              <label class="toggle-label">
                <input class="inputCheck" type="checkbox" name="showProgramme" id="showProgramme">
                <span class="slider"></span>
                Programme
              </label>
            </div>
            <div>
              <label class="toggle-label">
                <input type="checkbox" name="showCountingDays" id="showCountingDays">
                <span class="slider"></span>
                Counting Days
              </label>
            </div>
            <div class="nav-buttons">
              <button type="button" class="arrow-btn" onclick="prevForm()">←</button>
              <button type="submit" class="arrow-btn2">Submit</button>
            </div>
          </div>
    </section>
    </form>
    <section class="preview">
      <div><p id="previeweventType"></p></div>
     <div> <h1 id="previewnickName"></h1></div>
      <p id="previeweventDate"></p>
      <p id="previeweditorGreeting"></p>
      <p id="previeworganizerName"></p>
      <p id="previeweditorPhrases"></p>
      <p id="previewfullOrganizerName"></p>
      <p id="previewhigriDate"></p>
      <p id="previeweditorAddress"></p>
      <p id="previewmapsLink"></p>
      <p id="previeweditorProgramme"></p>
      <p id="previeweditorAdditionalInfo"></p>
      <p id="previewcontactName1"></p>
      <p id="previewcontactRelation1"></p>
      <p id="previewcontactNum1"></p>
      <p id="previewcontactName2"></p>
      <p id="previewcontactRelation2"></p>
      <p id="previewcontactNum2"></p>
      <div id="musicPreview">
        <div id="player-container" style="display: none;">
          <div id="player"></div>
        </div>
      </div>
    </section>
</div>

<script src="https://www.youtube.com/iframe_api"></script>
<script>
// JavaScript for form navigation
let currentForm = 1;
const totalForms = 8;

function showForm(formNumber) {
    document.querySelectorAll('.form').forEach(form => {
        form.classList.remove('active');
    });
    document.getElementById(`form${formNumber}`).classList.add('active');
    currentForm = formNumber;
}

function nextForm() {
    if (currentForm < totalForms) {
        // Before moving to next form, save the content of contenteditable divs to hidden inputs
        if(currentForm === 3) {
            document.getElementById('greetingText').value = document.getElementById('editorGreeting').innerHTML;
            document.getElementById('phrasesText').value = document.getElementById('editorPhrases').innerHTML;
        }
        if(currentForm === 4) {
            document.getElementById('addressText').value = document.getElementById('editorAddress').innerHTML;
        }
        if(currentForm === 5) {
            document.getElementById('programmeText').value = document.getElementById('editorProgramme').innerHTML;
            document.getElementById('additionalInfoText').value = document.getElementById('editorAdditionalInfo').innerHTML;
        }
        showForm(currentForm + 1);
    }
}

function prevForm() {
    if (currentForm > 1) {
        showForm(currentForm - 1);
    }
}

// Initialize the first form
showForm(1);

// Formatting functions for rich text editors
function format(command, editorId, value = null) {
    document.execCommand(command, false, value);
    document.getElementById(editorId).focus();
    updatePreview();
}

function changeFontSize(size, editorId) {
    document.getElementById(editorId).style.fontSize = size + 'px';
    updatePreview();
}

function changeFont(font, editorId) {
    document.getElementById(editorId).style.fontFamily = font;
    updatePreview();
}

// Update preview function
function updatePreview() {
    // Update all preview elements with their corresponding input values
    document.getElementById('previeweventType').textContent = document.getElementById('eventType').value;
    document.getElementById('previewnickName').textContent = document.getElementById('nickName').value;
    document.getElementById('previeweventDate').textContent = document.getElementById('eventDate').value;
    document.getElementById('previeweditorGreeting').innerHTML = document.getElementById('editorGreeting').innerHTML;
    document.getElementById('previeworganizerName').textContent = document.getElementById('organizerName').value;
    document.getElementById('previeweditorPhrases').innerHTML = document.getElementById('editorPhrases').innerHTML;
    document.getElementById('previewfullOrganizerName').textContent = document.getElementById('fullOrganizerName').value;
    document.getElementById('previewhigriDate').textContent = document.getElementById('higriDate').value;
    document.getElementById('previeweditorAddress').innerHTML = document.getElementById('editorAddress').innerHTML;
    document.getElementById('previewmapsLink').textContent = document.getElementById('mapsLink').value;
    document.getElementById('previeweditorProgramme').innerHTML = document.getElementById('editorProgramme').innerHTML;
    document.getElementById('previeweditorAdditionalInfo').innerHTML = document.getElementById('editorAdditionalInfo').innerHTML;
    document.getElementById('previewcontactName1').textContent = document.getElementById('contactName1').value;
    document.getElementById('previewcontactRelation1').textContent = document.getElementById('contactRelation1').value;
    document.getElementById('previewcontactNum1').textContent = document.getElementById('contactNum1').value;
    document.getElementById('previewcontactName2').textContent = document.getElementById('contactName2').value;
    document.getElementById('previewcontactRelation2').textContent = document.getElementById('contactRelation2').value;
    document.getElementById('previewcontactNum2').textContent = document.getElementById('contactNum2').value;
}

function updateMapPreview() {
    const mapLink = document.getElementById('mapsLink').value;
    document.getElementById('previewmapsLink').textContent = mapLink;
}

function updateWhatsappPreview1() {
    const num = document.getElementById('contactNum1').value;
    const isWhatsapp = document.getElementById('contactWhats1').checked;
    document.getElementById('previewcontactNum1').textContent = num + (isWhatsapp ? " (WhatsApp)" : "");
}

function updateWhatsappPreview2() {
    const num = document.getElementById('contactNum2').value;
    const isWhatsapp = document.getElementById('contactWhats2').checked;
    document.getElementById('previewcontactNum2').textContent = num + (isWhatsapp ? " (WhatsApp)" : "");
}

// YouTube Player API
let player;
let isPlaying = false;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '0',
        width: '0',
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady(event) {
    document.getElementById('playPauseButton').disabled = false;
}

function updateMusicPreview() {
    const youtubeLink = document.getElementById('youtubeLink').value;
    const startTime = document.getElementById('startTime').value;
    const autoPlay = document.getElementById('autoPlay').checked;

    if (youtubeLink) {
        const videoId = extractVideoId(youtubeLink);
        if (videoId) {
            document.getElementById('player-container').style.display = 'block';
            player.loadVideoById({
                videoId: videoId,
                startSeconds: convertTimeToSeconds(startTime)
            });
            if (autoPlay) {
                player.playVideo();
                isPlaying = true;
                updatePlayPauseButton();
            }
        }
    } else {
        document.getElementById('player-container').style.display = 'none';
    }
}

function togglePlayPause() {
    if (isPlaying) {
        player.pauseVideo();
    } else {
        player.playVideo();
    }
    isPlaying = !isPlaying;
    updatePlayPauseButton();
}

function updatePlayPauseButton() {
    const button = document.getElementById('playPauseButton');
    if (isPlaying) {
        button.innerHTML = '<span>Pause</span> <span><i class=\'bx bx-pause\'></i></span>';
    } else {
        button.innerHTML = '<span>Play</span> <span><i class=\'bx bx-play\'></i></span>';
    }
}

function extractVideoId(url) {
    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
    const match = url.match(regExp);
    return (match && match[2].length === 11) ? match[2] : null;
}

function convertTimeToSeconds(timeStr) {
    if (!timeStr) return 0;
    const parts = timeStr.split(':');
    if (parts.length === 2) {
        return parseInt(parts[0]) * 60 + parseInt(parts[1]);
    }
    return 0;
}

// Form submission handler
document.getElementById('cardForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Ensure all contenteditable content is saved to hidden inputs
    document.getElementById('greetingText').value = document.getElementById('editorGreeting').innerHTML;
    document.getElementById('phrasesText').value = document.getElementById('editorPhrases').innerHTML;
    document.getElementById('addressText').value = document.getElementById('editorAddress').innerHTML;
    document.getElementById('programmeText').value = document.getElementById('editorProgramme').innerHTML;
    document.getElementById('additionalInfoText').value = document.getElementById('editorAdditionalInfo').innerHTML;
    
    // Submit the form
    this.submit();
});
</script>
</body>
</html>
           <?php
include('contact.php');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM design");
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo htmlspecialchars($row['name']) ;
        // echo htmlspecialchars($row['image']) . "<br>";
        
        // Clean the image path
        $filename = trim($row['image'], '/');
        $filename = str_replace('images/', '', $filename);
        $imagePath = 'images/' . htmlspecialchars($filename);
        
        if (file_exists($imagePath)) {
            echo "<img src='" . $imagePath . "' width='200' alt='" . htmlspecialchars($row['name']) . "'><br><br>";
        } else {
            echo "Image not found: " . $imagePath . "<br>";
            echo "Real path: " . realpath($imagePath) . "<br><br>"; // Debug actual path
        }
    }
} else {
    echo "No designs found in the database.";
}

mysqli_close($conn);
?> 