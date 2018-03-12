# WEBWUT Event
**วิธีการติดตั้งระบบ**
1. Clone Project
    ```git clone https://github.com/Trosalio/webwut.git```
2. สร้าง Database ชื่อ webwutdb
3. import file ชื่อ webwutdb_update2.sql
4. เริ่มที่```{project-path}/webwut```

**อธิบายโครงสร้าง directory**
##### Folder #####
* administrator
    - css 
    - js - ใช้ส่งข้อมูลจาก index.phpของ administrator ไปที่php
    - php - ใช้ เพื่อเชื่อมต่อไป database ประกอบด้วยการ การ ADD, UPDATE, SELECT
    - index.php -หน้าหลักของ administrator
* assets
    - events
    - images
    - users
* css
* login
* organizer
     - css
     - event-form-components
     - homepage-components
     - js
     - php
* personalMessage
    - css
    - js
    - messageFile
    - php
* services
##### นอกโฟลเดอร์ #####
- index.php - หน้าแรกของเว็บไซต์
- login.php - หน้า login
- personalMessage.php - หน้าหลักของ Message
