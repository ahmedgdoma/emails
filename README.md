# **emails Task**
to test you should have latest version of `docker` and `docker-compose`

## Test
1- `make init`

2- visit `http://localhost:8008/sheet/upload`

3- upload file and add _subject, body_ then submit

4- visit `http://localhost:15671/#/queues` username and password are rabbitmq

5- you will find `sheet_process` queue has one ready message to run

6- run `php yii rabbitmq/consume sheet_process`

7- `send_email` will have ready queues as much as valid emails in sheet

8- validation file added to `web/processedFiles`