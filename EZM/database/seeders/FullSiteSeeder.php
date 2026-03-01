<?php

namespace Database\Seeders;

use App\Models\Achievements;
use App\Models\Benefits;
use App\Models\Courses;
use App\Models\Doctor;
use App\Models\Discount;
use App\Models\Favorite;
use App\Models\Goals;
use App\Models\inquire;
use App\Models\Order;
use App\Models\QFA;
use App\Models\Rating;
use App\Models\User;
use App\Models\video;
use App\Models\Web;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FullSiteSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedWeb();
        $this->seedUsers();
        $this->seedDoctors();
        $this->seedDiscounts();
        $this->seedCoursesAndVideos();
        $this->seedBenefits();
        $this->seedGoals();
        $this->seedAchievements();
        $this->seedQFA();
        $this->seedRatings();
        $this->seedFavorites();
        $this->seedOrders();
        $this->seedInquires();
    }

    private function seedWeb(): void
    {
        Web::updateOrCreate(
            ['id' => 1],
            [
                'introduction' => 'https://www.youtube.com/embed/5aww-Bpgkf4',
                'youtube' => 'https://www.youtube.com/',
                'facebook' => 'https://www.facebook.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'phone' => '+966501234567',
                'gmail' => 'contact@ezmedicine.com',
            ]
        );
    }

    private function seedUsers(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@ezmedicine.com'],
            [
                'name' => 'مدير المنصة',
                'type_user' => 1,
                'status' => 1,
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'image' => 'profile.jpg',
                'address' => 'الرياض، المملكة العربية السعودية',
                'phone' => '+966500000001',
            ]
        );

        $students = [
            ['name' => 'أحمد محمد العلي', 'email' => 'ahmed.ali@example.com'],
            ['name' => 'فاطمة حسن', 'email' => 'fatima.hassan@example.com'],
            ['name' => 'خالد عبدالله', 'email' => 'khalid.abdullah@example.com'],
            ['name' => 'نورة سعد', 'email' => 'noura.saad@example.com'],
            ['name' => 'عمر يوسف', 'email' => 'omar.youssef@example.com'],
        ];

        foreach ($students as $s) {
            User::firstOrCreate(
                ['email' => $s['email']],
                [
                    'name' => $s['name'],
                    'type_user' => 0,
                    'status' => 1,
                    'password' => Hash::make('password123'),
                    'email_verified_at' => now(),
                    'image' => 'profile.jpg',
                    'address' => 'المملكة العربية السعودية',
                    'phone' => null,
                ]
            );
        }
    }

    private function seedDoctors(): void
    {
        $doctors = [
            ['name' => 'د. سارة المطيري', 'spicification' => 'أمراض باطنية وقلب', 'university' => 'جامعة الملك سعود', 'age' => 42],
            ['name' => 'د. محمد الشهري', 'spicification' => 'جراحة عامة', 'university' => 'جامعة الملك عبدالعزيز', 'age' => 38],
            ['name' => 'د. نادية الحربي', 'spicification' => 'طب أسرة ومجتمع', 'university' => 'جامعة الإمام عبدالرحمن', 'age' => 35],
            ['name' => 'د. عبدالرحمن القحطاني', 'spicification' => 'أمراض صدرية ومناعة', 'university' => 'جامعة الملك فيصل', 'age' => 45],
        ];

        foreach ($doctors as $d) {
            Doctor::firstOrCreate(
                ['name' => $d['name']],
                [
                    'spicification' => $d['spicification'],
                    'university' => $d['university'],
                    'age' => $d['age'],
                ]
            );
        }
    }

    private function seedDiscounts(): void
    {
        Discount::firstOrCreate(
            ['id' => 1],
            ['discount_percentage' => 0, 'expired_at' => null]
        );
        Discount::firstOrCreate(
            ['discount_percentage' => 10],
            ['expired_at' => now()->addMonths(3)]
        );
        Discount::firstOrCreate(
            ['discount_percentage' => 20],
            ['expired_at' => now()->addMonths(1)]
        );
    }

    private function seedCoursesAndVideos(): void
    {
        $doctors = Doctor::all();
        $discounts = Discount::all();
        $webId = 1;

        $coursesData = [
            [
                'name' => 'أساسيات الطب الباطني',
                'price' => '499',
                'time_of_course' => '8 أسابيع',
                'discription' => 'دورة شاملة في أساسيات الطب الباطني تشمل الفحص السريري، تشخيص الأمراض الشائعة، وقراءة التحاليل. مناسبة لطلاب الطب والمقيمين.',
            ],
            [
                'name' => 'قراءة تخطيط القلب (ECG)',
                'price' => '349',
                'time_of_course' => '4 أسابيع',
                'discription' => 'تعلم قراءة وتفسير تخطيط القلب من الصفر. تشمل الحالات الحادة والمزمنة مع أمثلة عملية.',
            ],
            [
                'name' => 'الطوارئ الطبية',
                'price' => '599',
                'time_of_course' => '6 أسابيع',
                'discription' => 'إدارة الحالات الطارئة: إنعاش قلبي رئوي، صدمة، اختلاجات، وجرعات الأدوية في الطوارئ.',
            ],
            [
                'name' => 'الفحص السريري',
                'price' => '299',
                'time_of_course' => '3 أسابيع',
                'discription' => 'منهج عملي للفحص السريري لأجهزة الجسم مع فيديوهات توضيحية وتطبيق على حالات.',
            ],
        ];

        foreach ($coursesData as $i => $c) {
            $course = Courses::firstOrCreate(
                ['name' => $c['name']],
                [
                    'price' => $c['price'],
                    'discription' => $c['discription'],
                    'time_of_course' => $c['time_of_course'],
                    'doctor_id' => $doctors->get($i % $doctors->count())?->id ?? 1,
                    'discount_id' => $discounts->get($i % $discounts->count())?->id ?? 1,
                ]
            );

            $videoNames = [
                ['مقدمة وأهداف الدورة', 'الفحص السريري للجهاز التنفسي', 'الفحص السريري للقلب', 'حالات سريرية'],
                ['مقدمة عن التخطيط', 'الإيقاع والنظم', 'احتشاء العضلة القلبية', 'تمارين تطبيقية'],
                ['أساسيات الإنعاش', 'إدارة الصدمة', 'الاختلاجات والحالات الحادة'],
                ['الفحص العام', 'فحص الصدر والبطن', 'الفحص العصبي'],
            ];
            $descriptions = ['شرح نظري وتطبيق عملي.', 'مع أمثلة وحالات سريرية.', 'ملخص وتطبيقات.'];
            $times = ['00:45:00', '01:00:00', '00:30:00', '00:55:00'];

            $videosForCourse = $videoNames[$i % count($videoNames)] ?? $videoNames[0];
            foreach ($videosForCourse as $vi => $vName) {
                video::firstOrCreate(
                    [
                        'name' => $vName,
                        'courses_id' => $course->id,
                    ],
                    [
                        'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                        'discription' => $descriptions[$vi % count($descriptions)] ?? 'محاضرة تعليمية.',
                        'time_of_video' => $times[$vi % count($times)],
                    ]
                );
            }
        }
    }

    private function seedBenefits(): void
    {
        $items = [
            ['title' => 'محتوى معتمد', 'benefits' => 'جميع الدورات معتمدة من خبراء وأطباء ممارسين وتتوافق مع المعايير التعليمية.'],
            ['title' => 'تعلم في أي وقت', 'benefits' => 'ادخل المحاضرات من أي جهاز وفي الوقت الذي يناسبك مع إمكانية إعادة المشاهدة.'],
            ['title' => 'شهادة إتمام', 'benefits' => 'احصل على شهادة إتمام معتمدة بعد إنهاء كل دورة بنجاح.'],
            ['title' => 'دعم فني', 'benefits' => 'فريق دعم متاح للإجابة عن استفساراتك التقنية والتعليمية.'],
            ['title' => 'تحديث مستمر', 'benefits' => 'يتم تحديث المحتوى وفق أحدث المراجع والممارسات السريرية.'],
        ];

        foreach ($items as $item) {
            Benefits::firstOrCreate(
                ['title' => $item['title'], 'web_id' => 1],
                ['benefits' => $item['benefits']]
            );
        }
    }

    private function seedGoals(): void
    {
        $items = [
            ['title' => 'تعليم طبي عالي الجودة', 'golas' => 'تقديم محتوى طبي يلبي احتياجات الطلاب والممارسين ويرفع مستوى المعرفة السريرية.'],
            ['title' => 'الوصول لأكبر عدد من المتعلمين', 'golas' => 'جعل التعليم الطبي متاحاً عبر الإنترنت لكل من يريد التطوير في المجال الطبي.'],
            ['title' => 'الشراكات المؤسسية', 'golas' => 'التعاون مع الجامعات والمستشفيات لاعتماد الدورات وتقديمها للمتدربين.'],
        ];

        foreach ($items as $item) {
            Goals::firstOrCreate(
                ['title' => $item['title'], 'web_id' => 1],
                ['golas' => $item['golas']]
            );
        }
    }

    private function seedAchievements(): void
    {
        $items = [
            ['title' => 'أكثر من 5000 متعلم', 'achievement' => 'وصل عدد المسجلين في منصة EZ Medicine إلى أكثر من خمسة آلاف متعلم خلال السنوات الماضية.'],
            ['title' => 'شراكات جامعية', 'achievement' => 'اعتماد دوراتنا من أكثر من جامعة ومؤسسة تعليمية في المنطقة.'],
            ['title' => 'تقييم 4.8/5', 'achievement' => 'حصلت المنصة على تقييم مرتفع من المتعلمين من حيث جودة المحتوى ووضوح الشرح.'],
        ];

        foreach ($items as $item) {
            Achievements::firstOrCreate(
                ['title' => $item['title'], 'web_id' => 1],
                ['achievement' => $item['achievement']]
            );
        }
    }

    private function seedQFA(): void
    {
        $items = [
            ['quastion' => 'كيف أبدأ الدورة بعد التسجيل؟', 'answee' => 'بعد تسجيل الدخول ادخل إلى "الدورات" واختر الدورة ثم "عرض الدورة والمحتوى". من هناك يمكنك فتح المحاضرات ومشاهدتها.'],
            ['quastion' => 'هل الشهادة معتمدة؟', 'answee' => 'نعم. تحصل على شهادة إتمام معتمدة من المنصة بعد إكمال متطلبات الدورة بنجاح.'],
            ['quastion' => 'هل يمكنني إلغاء الاشتراك أو استرداد المبلغ؟', 'answee' => 'يمكنك مراجعة سياسة الاسترداد في صفحة الدورة. للاستفسارات تواصل معنا عبر نموذج "تواصل معنا".'],
            ['quastion' => 'ما طرق الدفع المتاحة؟', 'answee' => 'نقبل الدفع بالبطاقات الائتمانية وباقي الطرق المتاحة في صفحة الدفع عند إتمام الطلب.'],
        ];

        foreach ($items as $item) {
            QFA::firstOrCreate(
                ['quastion' => $item['quastion'], 'web_id' => 1],
                ['answee' => $item['answee']]
            );
        }
    }

    private function seedRatings(): void
    {
        $users = User::where('type_user', 0)->get();
        $courses = Courses::all();
        if ($users->isEmpty() || $courses->isEmpty()) {
            return;
        }

        $comments = [
            'دورة ممتازة ومحتوى واضح. استفدت كثيراً في عملي.',
            'الشرح منظم والتمارين مفيدة. أنصح بها لطلاب الطب.',
            'أفضل دورة أونلاين في المجال. شكراً للفريق.',
        ];

        foreach ($courses->take(3) as $course) {
            foreach ($users->take(2) as $user) {
                Rating::firstOrCreate(
                    ['user_id' => $user->id, 'courses_id' => $course->id],
                    ['comment' => $comments[array_rand($comments)]]
                );
            }
        }
    }

    private function seedFavorites(): void
    {
        $users = User::where('type_user', 0)->get();
        $courses = Courses::all();
        if ($users->isEmpty() || $courses->isEmpty()) {
            return;
        }

        foreach ($users->take(2) as $user) {
            foreach ($courses->take(2) as $course) {
                Favorite::firstOrCreate(
                    ['user_id' => $user->id, 'courses_id' => $course->id],
                    ['discription' => null]
                );
            }
        }
    }

    private function seedOrders(): void
    {
        $users = User::where('type_user', 0)->get();
        $courses = Courses::all();
        if ($users->isEmpty() || $courses->isEmpty()) {
            return;
        }

        foreach ($users->take(2) as $user) {
            foreach ($courses->take(2) as $course) {
                Order::firstOrCreate(
                    ['user_id' => $user->id, 'courses_id' => $course->id],
                    [
                        'price' => $course->price,
                        'image' => 'order_receipt.jpg',
                        'status' => 1,
                    ]
                );
            }
        }
    }

    private function seedInquires(): void
    {
        $users = User::where('type_user', 0)->get();
        if ($users->isEmpty()) {
            return;
        }

        $inquires = [
            ['subject' => 'استفسار عن الدورة', 'email' => $users[0]->email, 'discription' => 'أرغب بمعرفة مواعيد الدورة القادمة وهل يمكن الحصول على خصم للمجموعات.'],
            ['subject' => 'مشكلة تقنية', 'email' => $users[1]->email ?? $users[0]->email, 'discription' => 'الفيديو لا يعمل في المحاضرة الثالثة من دورة الطب الباطني.'],
        ];

        foreach ($inquires as $i => $q) {
            $user = $users->get($i % $users->count());
            if (!$user) {
                continue;
            }
            inquire::firstOrCreate(
                ['user_id' => $user->id, 'subject' => $q['subject']],
                ['email' => $q['email'], 'discription' => $q['discription']]
            );
        }
    }
}
