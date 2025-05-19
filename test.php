<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <title>عرض التصاميم</title>
  <style>
    
  /* باقي التنسيقات كما هي */
  
  .images {
    display: flex;
    flex-direction: column; /* من صف إلى عمود */
    gap: 15px; /* مسافة بين الصور */
    margin-top: 10px;
  }
  .images img {
    width: 100%; /* العرض كامل داخل الكارت */
    max-height: 300px; /* ارتفاع أقصى للصورة */
    object-fit: contain; /* للحفاظ على نسبة الصورة */
    border-radius: 5px;
    border: 1px solid #ddd;
  }


    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      margin: 20px;
      direction: rtl;
    }
    #designs {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }
    .design-card {
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 15px;
      width: 300px;
    }
    .design-card h3 {
      margin-top: 0;
      color: #333;
    }
    .price {
      font-weight: bold;
      margin-bottom: 10px;
      color: #008000;
    }
    .images {
      display: flex;
      gap: 10px;
    }
    .images img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 5px;
      border: 1px solid #ddd;
    }
  </style>
</head>
<body>

  <h2>عرض التصاميم</h2>
  <div id="designs"></div>

  <script>
    fetch('dash/designs.php')
      .then(response => response.json())
      .then(data => {
        const container = document.getElementById('designs');
        container.innerHTML = ''; // تنظيف الحاوية

        for (const key in data) {
          const item = data[key];

          // نجهز صور التصميم (لو موجودة)
          const imagesHTML = ['page1', 'page2', 'page3'].map(page => {
            return item[page] ? `<img src="${item[page]}" alt="${item.name}"/>` : '';
          }).join('');

          container.innerHTML += `
            <div class="design-card">
              <h3>${item.name}</h3>
              <p class="price">السعر: ${item.price} جنيه</p>
              <div class="images">${imagesHTML}</div>
            </div>
          `;
        }
      })
      .catch(err => {
        console.error('حدث خطأ في جلب التصاميم:', err);
        document.getElementById('designs').innerHTML = '<p>حدث خطأ في تحميل التصاميم.</p>';
      });
  </script>

</body>
</html>
