# Initialize project

## For Windows 7/10 Development/Test Environment

1.  Excute ```> init.bat```
1.  Select ```Development``` environment
1.  Update database config file ```common/config/main-local.php```
1.  Excute ```> php yii migrate```
1.  Excute ```> php yii init/admin```
1.  Excute ```> php yii migrate --migrationPath=@yii/rbac/migrations```
1.  Excute ```> php yii rbac/init```