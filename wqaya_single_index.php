<?php
// index.php - موقع "وقاية للخدمات الطبية المنزلية" (ملف واحد)
// الإعداد: هذا الملف يحتوي كل شيء - HTML, CSS, PHP handlers.
// التصرّف عند الإرسال: سيعرض رسالة نجاح بسيطة "تم الإرسال" دون حفظ البيانات بأي ملف.

$status = ''; // will hold 'ok' if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // بسيط: نأخذ المدخلات وننظفهم، ثم نعرض رسالة نجاح فقط
    function clean($s){ return trim(strip_tags($s)); }
    $p_name = isset($_POST['name']) ? clean($_POST['name']) : '';
    $p_email = isset($_POST['email']) ? clean($_POST['email']) : '';
    $p_phone = isset($_POST['phone']) ? clean($_POST['phone']) : '';
    $p_service = isset($_POST['service']) ? clean($_POST['service']) : '';
    $p_message = isset($_POST['message']) ? clean($_POST['message']) : '';
    $status = 'ok';
    // لا نقوم بالحفظ أو الإرسال - المستخدِم طلب الاكتفاء بعرض رسالة فقط.
}
?><!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>وقاية للخدمات الطبية المنزلية</title>
  <style>
    :root{
      --accent:#0f98c2; /* أزرق طبي فاتح */
      --accent-dark:#0b7285;
      --muted:#6b7280;
      --bg:#f7fbfd;
      --card:#ffffff;
      --radius:12px;
      font-family: "Segoe UI", Tahoma, "Helvetica Neue", Arial, sans-serif;
    }
    *{box-sizing:border-box}
    body{margin:0;background:var(--bg);color:#0f172a;line-height:1.6;direction:rtl}
    .header{background:linear-gradient(90deg,rgba(15,152,194,0.05),rgba(241,245,249,0.6));padding:14px;border-bottom:1px solid #e6eef2}
    .container{max-width:1100px;margin:0 auto;padding:18px}
    .brand{display:flex;gap:12px;align-items:center}
    .logo{
      width:64px;height:64px;border-radius:12px;background:var(--accent);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:20px;box-shadow:0 6px 18px rgba(15,152,194,0.12)
    }
    nav a{margin-left:14px;color:var(--accent-dark);text-decoration:none;font-weight:600}
    .hero{display:flex;flex-wrap:wrap;gap:20px;align-items:center;padding:22px 0}
    .hero h1{margin:0 0 10px 0;font-size:28px}
    .btn{display:inline-block;background:var(--accent);color:white;padding:10px 16px;border-radius:10px;text-decoration:none;font-weight:700}
    .card{background:var(--card);padding:16px;border-radius:var(--radius);box-shadow:0 6px 20px rgba(15,23,42,0.06)}
    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;margin-top:12px}
    .feature h3{margin:0 0 8px 0}
    footer{padding:18px 0;margin-top:28px;border-top:1px solid #e6eef2;color:var(--muted)}
    form label{display:block;margin-bottom:6px;font-weight:600}
    input[type="text"], input[type="email"], textarea, select{
      width:100%;padding:10px;border-radius:8px;border:1px solid #e6eef2;background:#fbfdff
    }
    .small{font-size:13px;color:var(--muted)}
    .testimonial{border-left:4px solid var(--accent);padding:12px;margin-bottom:10px;background:#fbfeff;border-radius:8px}
    .status-ok{background:#e6fffb;border:1px solid #c9fff2;padding:10px;border-radius:8px;color:#064e45;margin-bottom:12px}
    .nav-wrap{display:flex;align-items:center;gap:18px;flex-wrap:wrap}
    @media(min-width:900px){
      .hero{gap:36px}
      .hero .right{flex:0 0 420px}
    }
    /* simple responsive image placeholder */
    .hero-img{width:100%;height:200px;border-radius:10px;background:linear-gradient(180deg,#ffffff, #eaf6fb);display:flex;align-items:center;justify-content:center;color:var(--accent-dark);font-weight:700}
  </style>
</head>
<body>
  <header class="header">
    <div class="container" style="display:flex;align-items:center;justify-content:space-between">
      <div style="display:flex;gap:12px;align-items:center">
        <div class="logo">وقاية</div>
        <div>
          <div style="font-weight:800">وقاية للخدمات الطبية المنزلية</div>
          <div class="small">خدمات طبية وتمريضية وسحب تحاليل داخل مصر</div>
        </div>
      </div>
      <nav class="nav-wrap">
        <a href="#home">الرئيسية</a>
        <a href="#services">خدماتنا</a>
        <a href="#awareness">التوعية الصحية</a>
        <a href="#testimonials">آراء المستفيدين</a>
        <a href="#contact">تواصل</a>
      </nav>
    </div>
  </header>

  <main class="container" style="padding-top:18px">
    <section id="home" class="hero">
      <div class="left">
        <h1>خدمات طبية وتمريضية في المنزل — وسحب التحاليل</h1>
        <p class="small">نقدّم رعاية منزلية شاملة: تمريض منزلي، سحب عينات وتحاليل، رعاية مسنين، واستشارات طبية. فريق مؤهل مع معايير مكافحة عدوى صارمة.</p>
        <a class="btn" href="#contact">احجز خدمة</a>
      </div>
      <div class="right card" style="min-width:260px">
        <div class="hero-img">صورة طبية احترافية (استبدلها لاحقًا)</div>
        <h3 style="margin-top:12px">احجز خدمة منزلية</h3>
        <?php if($status === 'ok'): ?>
          <div class="status-ok">تم الإرسال — شكرًا لك. سنعاود الاتصال بك قريبًا.</div>
        <?php endif; ?>
        <form method="post" action="#contact">
          <label>الاسم</label>
          <input type="text" name="name" required>
          <label style="margin-top:8px">الهاتف</label>
          <input type="text" name="phone" required>
          <label style="margin-top:8px">الخدمة المطلوبة</label>
          <select name="service" required>
            <option value="تمريض منزلي">تمريض منزلي</option>
            <option value="سحب عينات">سحب عينات وتحاليل</option>
            <option value="رعاية مسنين">رعاية مسنين</option>
            <option value="استشارة طبية">استشارة طبية عن بعد</option>
          </select>
          <label style="margin-top:8px">ملاحظات</label>
          <textarea name="message" rows="3"></textarea>
          <div style="margin-top:10px"><button class="btn" type="submit">أرسل الطلب</button></div>
        </form>
        <p class="small" style="margin-top:8px">أو اتصل بنا على: +20 100 000 0000</p>
      </div>
    </section>

    <section id="services" style="margin-top:18px">
      <div class="card">
        <h2>خدماتنا</h2>
        <div class="grid" style="margin-top:12px">
          <div class="card">
            <h3>تمريض منزلي</h3>
            <p class="small">تضميد، إعطاء أدوية، متابعة حالات ما بعد العمليات، وإعطاء علاج وريدي.</p>
          </div>
          <div class="card">
            <h3>سحب عينات وتحاليل</h3>
            <p class="small">سحب عينات دم وبول ونقلها لمختبرات معتمدة، مع توصيل النتائج إلكترونيًا إذا رغبت.</p>
          </div>
          <div class="card">
            <h3>رعاية مسنين</h3>
            <p class="small">مساعدة يومية، إعطاء أدوية، دعم تغذية، ومتابعة طبية منتظمة.</p>
          </div>
          <div class="card">
            <h3>استشارات طبية</h3>
            <p class="small">تنسيق زيارات أطباء اختصاص وحلول استشارية عن بُعد.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="awareness" style="margin-top:18px">
      <div class="card">
        <h2>التوعية الصحية</h2>
        <div style="margin-top:12px">
          <article style="margin-top:12px">
            <h3>أهمية غسل اليدين</h3>
            <p class="small">غسل اليدين لصالحك: 20 ثانية بالماء والصابون يقلل من نقل الجراثيم. افعلها قبل الأكل وبعد السعال أو العطس.</p>
          </article>
          <article style="margin-top:12px">
            <h3>كيف تجهز مكان سحب العينات</h3>
            <p class="small">اختر غرفة هادئة ومضاءة، جهّز طاولة نظيفة، وابقِ المريض مرتاحًا — الفريق سيحضر أدوات معقمة.</p>
          </article>
          <article style="margin-top:12px">
            <h3>العناية بالمسنين</h3>
            <p class="small">متابعة الأدوية، التغذية السليمة، وتمارين بسيطة تساعد على تحسين نوعية الحياة.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="testimonials" style="margin-top:18px">
      <div class="card">
        <h2>آراء المستفيدين</h2>
        <div style="margin-top:12px">
          <div class="testimonial">
            <strong>أمينة — العبور</strong>
            <p class="small">"فريق محترف وجاء في نفس اليوم. شكراً لكم على الرعاية."</p>
          </div>
          <div class="testimonial">
            <strong>محمود — القاهرة</strong>
            <p class="small">"نتائج التحاليل وصلت بسرعة وتم الشرح بشكل واضح."</p>
          </div>
        </div>

        <h3 style="margin-top:12px">أضف رأيك</h3>
        <?php if($status === 'ok'): ?>
          <div class="status-ok">تم الإرسال — شكرًا لك. رأيك مهم وسنطلع عليه.</div>
        <?php endif; ?>
        <form method="post" action="#testimonials">
          <label>الاسم</label>
          <input type="text" name="name" required>
          <label style="margin-top:8px">نص التقييم</label>
          <textarea name="message" rows="3" required></textarea>
          <input type="hidden" name="service" value="تقييم">
          <div style="margin-top:10px"><button class="btn" type="submit">أرسل</button></div>
        </form>
      </div>
    </section>

    <section id="contact" style="margin-top:18px">
      <div class="card">
        <h2>تواصل معنا</h2>
        <?php if($status === 'ok'): ?>
          <div class="status-ok">تم الإرسال — شكرًا لك. سنعاود الاتصال بك قريبًا.</div>
        <?php endif; ?>
        <form method="post" action="#contact">
          <label>الاسم</label>
          <input type="text" name="name" required>
          <label style="margin-top:8px">البريد الإلكتروني</label>
          <input type="email" name="email" required>
          <label style="margin-top:8px">الهاتف</label>
          <input type="text" name="phone">
          <label style="margin-top:8px">الخدمة المطلوبة</label>
          <select name="service">
            <option>استعلام عام</option>
            <option>حجز خدمة منزلية</option>
            <option>سحب عينات</option>
            <option>تقييم</option>
          </select>
          <label style="margin-top:8px">الرسالة</label>
          <textarea name="message" rows="5" required></textarea>
          <div style="margin-top:10px"><button class="btn" type="submit">أرسل</button></div>
        </form>
      </div>
    </section>

    <footer style="margin-top:18px" class="card">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap">
        <div class="small">© <?php echo date('Y'); ?> وقاية للخدمات الطبية المنزلية — كل الحقوق محفوظة</div>
        <div class="small">صُنع بحب لخدمات الرعاية المنزلية</div>
      </div>
    </footer>
  </main>
</body>
</html>
