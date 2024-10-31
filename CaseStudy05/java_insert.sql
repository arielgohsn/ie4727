use javajam;

insert into menu values
(1, "Just Java"),
(2, "Cafe au Lait"),
(3, "Iced Cappuccino");

insert into shots values
(1, "Single"),
(2, "Double");

insert into coffee_prices (menuid, shotid, price) values
(1, NULL, 2.00),
(2, 1, 2.00),
(2, 2, 3.00),
(3, 1, 4.75),
(3, 2, 5.75);