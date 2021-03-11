# Тестовое задание на позицию "Junior/Middle PHP-Разработчик" в компанию Оптзилла
### Суммарное время выполнения 
8-10 часов (ибо Zend Framework вижу впервые, но было интересно поразбираться, вообще сейчас работаю на Yii2)
### Запросы (использовал PostgreSQL)
- создание таблицы:
```
CREATE TABLE public.guest_messages (
  guest_message_id bigserial NOT NULL,
  guest_message_text varchar(255) NOT NULL,
  guest_email varchar(60) NOT NULL,
  guest_message_date_created timestamp(6) NOT NULL //можно было бы также триггер перед вставкой сделать для автоматического выставления актуальной даты 
  CONSTRAINT guest_messages_pk PRIMARY KEY (guest_message_id)
);
```
- создание индекса:
```
CREATE INDEX guest_messages_guest_message_date_created_idx ON public.guest_messages (guest_message_date_created DESC);
```
### Внешний вид
- Использовал Bootstrap, правда 4, а не 3 (c бутстрапом впервые тоже работал, но вообще с идеей UI-фреймворков знаком, сейчас работаю с Fomantic UI)
![Image alt](https://github.com/SibiryakovVictor/optzilla_test_task/raw/main/app.png)
### Контакты
- резюме: https://kazan.hh.ru/resume/a4169750ff07ca937d0039ed1f3675484d436d
- почта: dcrulez9601@gmail.com
