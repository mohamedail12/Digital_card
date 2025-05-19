<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المنتج الفاخر</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --danger: #dc2626;
            --danger-dark: #b91c1c;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
            --border-radius: 16px;
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            padding: 2rem;
        }

        .luxury-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            position: relative;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .luxury-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .card-badge {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            background: linear-gradient(to right, #f59e0b, #ef4444);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 700;
            z-index: 10;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .card-media {
            height: 280px;
            position: relative;
            overflow: hidden;
        }

        .card-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .luxury-card:hover .card-media img {
            transform: scale(1.08);
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 0;
            height: 40%;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
        }

        .card-price {
            color: white;
            font-size: 1.75rem;
            font-weight: 800;
        }

        .card-old-price {
            text-decoration: line-through;
            color: var(--gray);
            font-size: 1.25rem;
            margin-left: 0.75rem;
        }

        .card-content {
            padding: 1.75rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1.375rem;
            color: var(--dark);
            margin-bottom: 1rem;
            font-weight: 700;
            line-height: 1.4;
        }

        .card-description {
            color: var(--gray);
            font-size: 0.9375rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-rating {
            color: #f59e0b;
            font-size: 0.9375rem;
        }

        .card-sold {
            color: var(--gray);
            font-size: 0.875rem;
        }

        .card-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .btn {
            border: none;
            border-radius: var(--border-radius);
            padding: 0.875rem 1.5rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: var(--transition);
            font-size: 0.9375rem;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
            flex: 1;
        }

        .btn-danger:hover {
            background: var(--danger-dark);
            transform: translateY(-2px);
        }

        .btn-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background: #f1f5f9;
            color: var(--dark);
            padding: 0;
        }

        .btn-icon:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .card-media {
                height: 220px;
            }

            .card-content {
                padding: 1.25rem;
            }

            .card-price {
                font-size: 1.5rem;
            }

            .card-old-price {
                font-size: 1rem;
            }

            .btn {
                font-size: 0.875rem;
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>
<body>

<?php 
include('contact.php');
$result = mysqli_query($conn, "SELECT * FROM `design`");

while($row = mysqli_fetch_array($result)) {
    $ID = $row['id'];
    $NAME = htmlspecialchars($row['name']);
    $PRICE = htmlspecialchars($row['price']);
    $IMAGE = htmlspecialchars($row['image']);

    echo "
    <div class='luxury-card'>
        <span class='card-badge'> $NAME</span>
        
        <div class='card-media'>
            <img src='$IMAGE' alt='ساعة فاخرة'>
            <div class='card-overlay'>
                <div class='card-price'>
                    $PRICE
                    <span class='card-old-price'>$PRICE</span>
                </div>
            </div>
        </div>
        
        <div class='card-content'>
            <div class='card-meta'>
                <div class='card-rating'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star-half-alt'></i>
                </div>
                <div class='card-sold'>بيع 340 قطعة</div>
            </div>
            
            <div class='card-actions'>
                <button class='btn btn-icon' title='إضافة إلى المفضلة'>
                    <i class='far fa-heart'></i>
                </button>
                <a href='delete_design.php?id=$ID' class='btn btn-danger' onclick='return confirm(\"هل أنت متأكد من حذف المنتج؟\")'>
                    <i class='fas fa-trash-alt'></i>
                    حذف المنتج
                </a>
            </div>
        </div>
    </div>";    
}
?>
</body>
</html>
