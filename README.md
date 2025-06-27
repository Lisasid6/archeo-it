# 🌍Archéo-IT – Projet de fin d’année

**Archéo-IT** est un site web éducatif développé dans le cadre du projet FAP.  
Il permet de présenter des actualités archéologiques et de gérer des inscriptions via un script Python.

---

## 📁 Arborescence du projet

archeo-it/
├── index.php
├── chantiers.php
├── contact.php
├── inscription.php
├── login.php
├── logout.php
├── includes/
│ ├── header.php
│ ├── footer.php
│ └── db.php
├── assets/
│ ├── css/
│ ├── js/
│ └── images/
├── python/
│ └── generate_password.py
├── bdd/
│ └── archeo.sql
└── README.md


---

## ✨ Fonctionnalités principales

✅ Affichage dynamique des actualités  
✅ Liste des chantiers archéologiques  
✅ Formulaire de contact connecté à la BDD  
✅ Inscription avec génération de mot de passe Python  
✅ Gestion de session utilisateur (connexion / déconnexion)  

---

## 🛠️ Technologies utilisées

- **HTML / CSS / JavaScript** (Frontend)
- **PHP** (Backend, avec PDO)
- **MySQL** (Base de données)
- **Python 3** (Script de génération de mot de passe)
- **Apache2 sous Debian** (Hébergement)

---

## ⚙️ Installation

**Prérequis :**
- Debian ou Ubuntu Server
- Apache2
- PHP
- MySQL
- Python 3

**Étapes :**
1. Cloner le dépôt ou copier le dossier `archeo-it` :
   ```bash
   git clone https://github.com/Lisasid6/archeo-it.git
2. Copier dans le répertoire Apache :

sudo cp -r archeo-it /var/www/html/
sudo chown -R www-data:www-data /var/www/html/archeo-it
3. Créer la base MySQL :

CREATE DATABASE archeo_it;
CREATE USER 'archeo'@'localhost' IDENTIFIED BY 'motdepasse';
GRANT ALL PRIVILEGES ON archeo_it.* TO 'archeo'@'localhost';
FLUSH PRIVILEGES;

4. Importer le script SQL :

mysql -u archeo -p archeo_it < archeo.sql

5. Vérifier que shell_exec() est activé dans php.ini.

💻 Accéder au site

http://localhost/archeo-it/

👤 Auteur
Lisa Sid
Projet FAP – Année 2024-2025

📄 Licence
Projet pédagogique – usage strictement éducatif.
