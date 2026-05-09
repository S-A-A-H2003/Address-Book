# Address Book Pro 📖

نظام عصري لإدارة جهات الاتصال مبني باستخدام إطار العمل Laravel، يتميز بواجهة مستخدم جذابة وتجربة مستخدم سلسة.

## ✨ المميزات

*   **إدارة جهات الاتصال:** إضافة، عرض، وحذف جهات الاتصال بسهولة.
*   **تعدد الأرقام:** إمكانية إضافة حتى 10 أرقام هواتف مختلفة لكل جهة اتصال (عمل، شخصي، عائلي، إلخ).
*   **البحث المتقدم:** محرك بحث سريع للوصول لجهات الاتصال عن طريق الاسم أو رقم الهاتف.
*   **واجهة مستخدم عصرية:** تصميم متجاوب باستخدام Bootstrap 5 و Tailwind CSS مع تأثيرات حركية باستخدام Animate.css.
*   **التحقق من البيانات:** نظام دقيق للتحقق من المدخلات لضمان جودة البيانات.

## 🛠 التقنيات المستخدمة

*   **Framework:** [Laravel 10+](https://laravel.com)
*   **Frontend:** Blade Templates, Bootstrap 5, Tailwind CSS.
*   **Icons & Fonts:** FontAwesome 6.
*   **Animations:** Animate.css.
*   **Database:** MySQL (أو أي قاعدة بيانات يدعمها Laravel).

## 🚀 تثبيت المشروع

1.  **تحميل المشروع:**
    ```bash
    git clone https://github.com/your-username/AddressBookSystem.git
    cd AddressBookSystem
    ```

2.  **تثبيت المكتبات البرمجية:**
    ```bash
    composer install
    npm install && npm run dev
    ```

3.  **إعداد ملف البيئة:**
    قم بنسخ ملف `.env.example` إلى `.env` وتعديل بيانات قاعدة البيانات:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **تهجير قاعدة البيانات (Migrations):**
    ```bash
    php artisan migrate
    ```

5.  **تشغيل المشروع:**
    ```bash
    php artisan serve
    ```

---
تم التطوير بكل ❤️ باستخدام Laravel.
