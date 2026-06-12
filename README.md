# 🔧 SWIFT FIX — Ремонт телефонов

Сайт сервисного центра по ремонту телефонов.  
Разработан по макету из Figma, позже доработан функционалом отслеживания заказов.

🔗 **Демо (только статика):** [https://smehovartem566.github.io/swift-fix-remont](https://smehovartem566.github.io/swift-fix-remont)  
📂 **Код:** [GitHub](https://github.com/smehovartem566/swift-fix-remont)

> ⚠️ **Важно:** GitHub Pages отображает только HTML/CSS/JS.  
> PHP-функционал (отправка форм, работа с БД) работает **только локально** через XAMPP.
---

## 📌 О проекте

Сайт работал на реальном хостинге (Beget) и принимал заявки от клиентов.

**Что реализовано:**

- Адаптивная вёрстка по макету из Figma  
- Карусель брендов смартфонов  
- Формы записи на ремонт (с валидацией, чекбоксом согласия)  
- Отправка данных через PHP в базу данных MySQL  
- Страница **«Отследить ремонт»** — поиск заказа по номеру телефона и ID  
- Вывод статуса заказа (В процессе / Готово)  
- Просмотр всех заказов по номеру телефона  

---

## 🛠 Технологии

| Назначение | Технологии |
|------------|------------|
| Фронтенд | HTML5, CSS3, Bootstrap 5, JavaScript |
| Бэкенд | PHP (обработка форм, работа с БД) |
| База данных | MySQL |
| Локальный сервер | XAMPP |

---

## 📁 Структура проекта

```
swift-fix-remont/
├── db.php              # подключение к БД + автосоздание таблицы
├── send_form.php       # обработка форм (запись в БД)
├── order.php           # поиск и отображение статуса заказа
├── index.html          # главная страница
├── servies.html        # услуги и цены (форма записи)
├── regist.html         # контакты, карта, форма обратной связи
├── styles/
│   └── styles.css      # кастомные стили
├── img/                # изображения (логотипы, аватарки, телефоны)
└── README.md
```

---

## 🚀 Быстрый старт (локально)

### 1. Установи XAMPP  
[Скачать XAMPP](https://www.apachefriends.org/ru/download.html)

### 2. Скопируй проект в папку `htdocs`

```bash
git clone https://github.com/smehovartem566/swift-fix-remont.git
```
```
C:\xampp\htdocs\swift-fix-remont\
```

### 3. Запусти Apache и MySQL в XAMPP

### 4. Открой сайт в браузере

```
http://localhost/swift-fix-remont/index.html
```

### 5. База данных создастся автоматически

Файл `db.php` создаст базу `swift_fix` и таблицу `swiftorder` при первом обращении.  
Ничего импортировать вручную не нужно.

---

## 📸 Скриншоты
<img width="367" height="891" alt="image" src="https://github.com/user-attachments/assets/1b5857a4-4343-4fef-b506-6b1cffec5d47" />
<img width="499" height="259" alt="Снимок экрана 2026-06-12 171220" src="https://github.com/user-attachments/assets/82da32fe-db0f-4dcd-87c0-513e46ecb193" />
<img width="700" height="370" alt="Снимок экрана 2026-06-12 171318" src="https://github.com/user-attachments/assets/c273978e-ac30-4166-b986-e022de251991" />
<img width="624" height="795" alt="Снимок экрана 2026-06-12 171423" src="https://github.com/user-attachments/assets/8d608fc2-8bd3-48c9-8c1a-30006d1de0aa" />
<img width="646" height="489" alt="Снимок экрана 2026-06-12 171354" src="https://github.com/user-attachments/assets/d9256ec5-89a7-49d4-a5ea-5422555ebffa" />


---

## 👤 Автор

Артём Смехов — [GitHub](https://github.com/smehovartem566)
