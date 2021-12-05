**TABLES**  
Please note, you will need to run `php artisan migrate` command to create `data_captures` table.

**TABLE REFERENCED BY MODEL**  
Moreover, inside **DataCapture** model I've set it to be corresponding to specific table **'data_captures'**,
I am not sure what structure you will use while testing, so either please remove that assignment from
the **DataCapture** model, or make your table name to be **'data_captures'**.

**POSTCODE VALIDATION**  
For the postcode validation I am using the following package `https://github.com/JustSteveKing/LaravelPostcodes`

**GOOGLE API**  
You will need your own `GOOGLE_API_KEY` - please add it in `.env` file.
Make sure that you have enable geocoding api in your google console please.
