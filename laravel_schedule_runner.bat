@echo off
cd C:\xampp\htdocs\aplikasi_pakar_smpkp2
C:\xampp\php\php.exe artisan schedule:run >> schedule.log 2>&1
