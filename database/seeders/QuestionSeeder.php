<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Question::query()->delete();


        // don't change question format unless you're going to change the whole logic of questions


        $data = collect([
            [
                'Text' => 'در کدام یکی از نواحی صورت خود احساس چربی می کنید؟',
                'Number' => 1,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'کل صورت'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'در پیشانی و بینی و چانه ولی بقیه نواحی نرمال'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'در پیشانی و بینی و چانه ولی بقیه نواحی احساس کشیدگی'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'هیچ کدام از نواحی صورتم احساس چربی نمیکنم'
                    ],
                ]
            ],
            [
                'Text' => 'وضعیت منافذ شما چگونه است؟',
                'Number' => 2,
                'Answers' => [
                    'a' => [
                        'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                        'Text' => 'بزرگ یا باز'
                    ],
                    'b' => [
                        'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                        'Text' => 'کوچک یا نرمال'
                    ]
                ]
            ],
            [
                'Text' => 'در کدام نواحی از صورت خود احساس کشیدگی می کنید؟',
                'Number' => 3,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'کل صورت'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'پیشانی و بینی'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'گونه ها و دور لب'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'هیچکدام از نواجی احساس کشیدگی ندارم'
                    ],
                ]
            ],
            [
                'Text' => 'آیا پوست شما دچار جوش چرکی التهابی می شود؟',
                'Number' => 4,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'اصلا نه'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیلی کم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'معمولا بله و زیاد'
                    ]
                ]
            ],
            [
                'Text' => 'آیا پوست شما دچار جوش های زیرپوستی و جوش های سرسیاه و سرسفید می شود؟',
                'Number' => 5,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'معمولا نه یا خیلی کم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'معمولا بله و خیلی زیاد'
                    ]
                ]
            ],
            [
                'Text' => 'جنس پوست شما به چه صورت است؟',
                'Number' => 6,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'جنس زبر دارد یا معمولا خارش دارد'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'جنس مخملی دارد و معمولا براق است'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'کدر و بدون درخشندگی و آب'
                    ]
                ]
            ],
            [
                'Text' => 'آیا در نواحی از پوست حالت پوسته پوسته شدن دارید؟',
                'Description' => 'منظور از پوسته پوسته شدن شرایطی مشابه با تصویر زیر است',
                'Number' => 7,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'اصلا'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیلی کم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'معمولا بله و زیاد'
                    ]
                ]
            ],
            [
                'Text' => 'آیا در نواحی از پوست خود قرمزی دارید؟',
                'Number' => 8,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'اصلا'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیلی کم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'معمولا بله و زیاد'
                    ]
                ]
            ],
            [
                'Text' => 'پوست صورتتان در چه صورتی قرمزی و سوزش دارد؟',
                'Number' => 9,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'در معرض آفتاب بیش از حد قرمز میشود'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'با زدن هر نوع کرم لایه بردار یا ضد جوش'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'با زدن کرم های آب رسان و مرطوب کننده'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'اصلا ندارم'
                    ]
                ]
            ],
            [
                'Text' => 'وقتی پوست خود را نیشگون میگیرید کدام یک از حالات زیر ایجاد می گردد؟',
                'Description' => 'منظور از نیشگون گرفتن حالتی مانند تصویر زیر می باشد.',
                'Number' => 10,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'به سرعت به حالت اولیه برمیگردد'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'با زدن هر نوع کرم لایه بردار یا ضد جوش'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'ابتدا چروکیده می شود و تا پوست صاف و به حالت عادی بازگردد کمی زمان می برد'
                    ]
                ]
            ],
            [
                'Text' => 'آیا پوست شما دچار چین و چروک شده است ؟ بیشتر در کدام نواحی هستند؟',
                'Description' => 'منظور از چین و چروک خطوط ایجاد شده در چهره همچون تصویر زیر می باشد.',
                'Number' => 11,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'اصلا چروک ندارم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'پیشانی'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'دور چشم'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'گونه و چانه'
                    ]
                ]
            ],
            [
                'Text' => 'آیا در نواحی از پوست خود دچار تیرگی و لک هستید؟',
                'Number' => 12,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'اصلا تیرگی ندارم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'روی گونه ها دچار لک هستم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'در پیشانی دچار لک هستم'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'لک های پخش روی کل صورت دارم'
                    ]
                ]
            ],
            [
                'Text' => 'آیا دچار کک و مک هستید؟',
                'Number' => 13,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'نه اصلا'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'بله روی بعضی از نواحی صورتم دارم'
                    ]
                ]
            ],
            [
                'Text' => 'آیا در پوست صورت خود دچار افتادگی و شلی پوست هستید؟',
                'Number' => 14,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'نه اصلا'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'بله خیلی کم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'بله خیلی زیاد'
                    ]
                ]
            ],
            [
                'Text' => 'آیا در پوست خود جای جوش به صورت لک دارید؟',
                'Number' => 15,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا در پوست خود جای جوش فرو رفته(اسکار جوش) دارید؟',
                'Number' => 16,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا زیاد آرایش می کنید؟',
                'Description' => 'منظور از آرایش زیاد این است که هر روز بیش از 4 ساعت آرایش روی پوست شما هست',
                'Number' => 17,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آرایش خود را چگونه پاک می کنید؟',
                'Number' => 18,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'آرایش نمیکنم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'آرایش خودم را با آب پاک میکنم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'با همان شوینده ای که صورتم را میشویم آرایشم را هم میشویم'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'با دستمال مرطوب پاک کننده آرایش پاک میکنم'
                    ],
                    'e' => [
                        'Content' => null,
                        'Text' => 'از شیر پاک کن یا میسلار واتر برای پاک کردن آرایش استفاده میکنم'
                    ],
                ]
            ],
            [
                'Text' => 'در حال حاضر پوست خود را با کدام یک از موارد زیر می شویید؟',
                'Number' => 19,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'فقط آب'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'صابون'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'شامپو بچه'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'ژل یا فوم شستشو صورت'
                    ]
                ]
            ],
            [
                'Text' => 'آیا تونر استفاده می کنید؟',
                'Number' => 20,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا از ضدآفتاب استفاده می کنید؟',
                'Number' => 21,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا از آبرسان استفاده می کنید؟',
                'Number' => 22,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'چند ساعت در روز در معرض آفتاب هستید؟',
                'Description' => 'منظور از آفتاب در معرض نور خورشید قرار گرفتن است حتی نوری که از پنجره خانه یا خودرو به پوست شما می تابد',
                'Number' => 23,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'کمتر از یک ساعت'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'بین 1 الی 4 ساعت'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'بیش از 4 ساعت'
                    ],
                ]
            ],
            [
                'Text' => 'ایا تا به حال از لایه بردار (اسیدها، aha  و... ) استفاده کرده اید؟',
                'Number' => 24,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'خیر استفاده نکرده ام'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'بله بیشتر از 3 ماه'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'بله کمتر از 3 ماه'
                    ],
                ]
            ],
            [
                'Text' => 'جنسیت شما؟',
                'Number' => 25,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'آقا'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خانم'
                    ]
                ]
            ],
            [
                'Text' => 'دوره عادات ماهیانه منظمی دارید؟',
                'Number' => 26,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا بر روی صورت خود موهای ضخیم دارید؟',
                'Number' => 27,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'روی چانه و پشت لبم و زیر گردن موی ضخیم دارم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'روی بیشتر نواحی صورتم موی ضخیم دارم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'اصلا ندارم'
                    ]
                ]
            ],
            [
                'Text' => 'آیا سابقه بارداری دارید؟',
                'Number' => 28,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا هم اکنون باردار هستید؟',
                'Number' => 29,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'تا به حال آزمایش هورمونی دادید؟ آیا دچار اختلالات هورمونی هستید؟',
                'Number' => 30,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'آزمایش ندادم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'آزمایش دادم و مشکل هورمونی ندارم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'آزمایش دادم و دچار عدم تعادل هورمونی هستم'
                    ]
                ]
            ],
            [
                'Text' => 'آیا دچار کم کاری یا پرکاری تیروئید هستید؟',
                'Number' => 31,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'نمیدانم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'ندارم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'پرکاری تیروئید دارم'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'کم کاری تیروئید دارم'
                    ]
                ]
            ],
            [
                'Text' => 'آیا در معرض تنش و استرس های شدید هستید؟',
                'Number' => 32,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا دچار زخم باز یا عفونت های پوستی هستید؟',
                'Number' => 33,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا تا به حال تحت درمان داروی راکوتان قرار گرفته اید؟',
                'Number' => 34,
                'Content' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fmobilizingjustice.ca%2Fdesigning-the-first-national-survey-on-transportation-equity-in-canada%2F&psig=AOvVaw3M6WckjC0sVcW2EZZ-abuo&ust=1713078257669000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCNCZorDCvoUDFQAAAAAdAAAAABAE',
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'بله کمتر از 3 ماه'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'بله بیش از 3 ماه'
                    ]
                ]
            ],
            [
                'Text' => 'اگر قرص راکوتان استفاده کرده اید چند عدد قرص مصرف کرده اید؟',
                'Number' => 35,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'استفاده نکردم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'کمتر از 30 عدد'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'بین 30 تا 100 عدد'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'بیش از 100 عدد'
                    ]
                ]
            ],
            [
                'Text' => 'آیا تا به حال تحت درمان شیمی درمانی یا پرتو درمانی بوده اید؟',
                'Number' => 36,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا تا به حال از لیزر های درمانی برای درمان مشکلات پوستی خود استفاده کرده اید؟',
                'Description' => 'منظور از لیزرهای درمانی همچون فرکشنال، co2، کیوسوییچ و ... است. توجه داشته باشید لیزر موهای زائد در این دسته قرار نمی گیرد.',
                'Number' => 37,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'خیر'
                    ]
                ]
            ],
            [
                'Text' => 'آیا از آنتی بیوتیک ها (مثل آموکسی سیلین ، سفلکسین و ...) استفاده میکنید؟',
                'Number' => 38,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله و هنوز استفاده میکنم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'تا 2 ماه گذشته استفاده میکردم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'بیش از 3 ماه از آخرین استفاده ام گذشته است'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'استفاده نمیکنم'
                    ]
                ]
            ],
            [
                'Text' => 'آیا از داروهای کورتن دار استفاده می کنید؟',
                'Number' => 39,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'بله و هنوز استفاده میکنم'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'تا 2 ماه گذشته استفاده میکردم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'بیش از 3 ماه از آخرین استفاده ام گذشته است'
                    ],
                    'd' => [
                        'Content' => null,
                        'Text' => 'استفاده نمیکنم'
                    ]
                ]
            ],
            [
                'Text' => 'آیا در تغذیه از غذاهای چرب و فست فودها استفاده می کنید؟',
                'Number' => 40,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'کمتر از یک وعده در هفته'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'بیش از 3 وعده در هفته'
                    ]
                ]
            ],
            [
                'Text' => 'آیا تا به حال پاکسازی یا فیشال انجام داده اید؟',
                'Number' => 41,
                'Answers' => [
                    'a' => [
                        'Content' => null,
                        'Text' => 'تا به حال انجام نداده ام'
                    ],
                    'b' => [
                        'Content' => null,
                        'Text' => 'بله ماهیانه و به صورت منظم انجام می دهم'
                    ],
                    'c' => [
                        'Content' => null,
                        'Text' => 'کمتر از 3 الی 4 بار در سال انجام دادم'
                    ]
                ]
            ],
        ]);

        $data = $data->map(function ($item) {
            return [
                'Text' => $item['Text'],
                'Number' => $item['Number'],
                'Content' => $item['Content'] ?? null,
                'Description' => $item['Description'] ?? null,
                'Answers' => json_encode($item['Answers']),
            ];
        });


        Question::query()->insert($data->all());
    }


}
