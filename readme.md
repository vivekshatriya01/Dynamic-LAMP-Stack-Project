# 🚀 Dynamic LAMP Stack Deployment on RHEL 10

This project demonstrates a full LAMP (Linux, Apache, MariaDB, PHP) stack deployment on Red Hat Enterprise Linux 10.

## 📌 Architecture
* **OS:** Red Hat Enterprise Linux 10
* **Web Server:** Apache (httpd)
* **Database:** MariaDB 10.x
* **Language:** PHP 8.3

## ⚙️ Key Commands Used

### 1. Web Server & Firewall
```bash
dnf install httpd -y
systemctl enable --now httpd
firewall-cmd --permanent --add-service=http
firewall-cmd --reload

