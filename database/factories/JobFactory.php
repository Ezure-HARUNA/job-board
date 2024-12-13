<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use App\Models\Job;
use Illuminate\Support\Facades\Schema;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $faker = FakerFactory::create('ja_JP');

    $jobDescriptions = [
      'ソフトウェアエンジニア' => [
        'company' => '当社は最新技術を駆使したソフトウェア開発を行っています。',
        'benefits' => 'フレキシブルな勤務時間とリモートワークが可能です。',
        'skills' => 'JavaやPythonなどのプログラミング言語に精通している方。'
      ],
      'プロジェクトマネージャー' => [
        'company' => 'グローバルなプロジェクト管理を専門としています。',
        'benefits' => 'リーダーシップ研修とキャリアアップの機会があります。',
        'skills' => '優れたリーダーシップとコミュニケーション能力を持つ方。'
      ],
      'デザイナー' => [
        'company' => 'クリエイティブなデザインソリューションを提供しています。',
        'benefits' => '自由な発想を尊重する職場環境です。',
        'skills' => 'Adobe Creative Suiteに精通している方。'
      ],
      'マーケティングマネージャー' => [
        'company' => 'デジタルマーケティングの専門家が集まる会社です。',
        'benefits' => '成果に応じた報酬制度があります。',
        'skills' => 'SEOやSEMの知識が豊富な方。'
      ],
      'データサイエンティスト' => [
        'company' => 'データ分析と機械学習を駆使してビジネスの成長を支援します。',
        'benefits' => '最新のデータツールを使用し、データドリブンな意思決定をサポートします。',
        'skills' => 'PythonやR、SQLの知識が豊富な方。'
      ],
      'セールスエグゼクティブ' => [
        'company' => '多国籍のクライアントに対してソリューションを提供しています。',
        'benefits' => '高いコミッション制度とキャリアアップのチャンスがあります。',
        'skills' => '優れた営業スキルと顧客管理能力を持つ方。'
      ],
      'カスタマーサポート' => [
        'company' => 'お客様第一のサポート体制を整えています。',
        'benefits' => '充実した研修制度と成長の機会があります。',
        'skills' => '優れたコミュニケーション能力と問題解決能力を持つ方。'
      ],
      'ネットワークエンジニア' => [
        'company' => '安全で高性能なネットワークインフラを構築しています。',
        'benefits' => '最新のネットワーク技術に触れる機会が多い職場です。',
        'skills' => 'ネットワーク設計とセキュリティの知識がある方。'
      ],
      'UI/UXデザイナー' => [
        'company' => 'ユーザーエクスペリエンスを最優先に考えるデザインチームです。',
        'benefits' => 'ユーザー調査やプロトタイピングに積極的に関わることができます。',
        'skills' => 'SketchやFigmaの使用経験がある方。'
      ],
      'フロントエンドエンジニア' => [
        'company' => '魅力的で直感的なWebインターフェースを開発しています。',
        'benefits' => '最新のフロントエンド技術を使用する機会が多いです。',
        'skills' => 'HTML、CSS、JavaScriptに精通している方。'
      ],
      'バックエンドエンジニア' => [
        'company' => 'スケーラブルで信頼性の高いバックエンドシステムを構築しています。',
        'benefits' => 'サーバーサイドの最新技術を学べる環境です。',
        'skills' => 'Node.jsやRuby on Railsの経験がある方。'
      ],
      'システムアナリスト' => [
        'company' => 'ビジネス要件を技術要件に変換する専門家が集まる会社です。',
        'benefits' => 'プロジェクトマネージャーと密接に連携して働けます。',
        'skills' => '分析力とドキュメント作成能力がある方。'
      ],
      'プロダクトマネージャー' => [
        'company' => '革新的な製品開発に注力しています。',
        'benefits' => '製品の企画からリリースまでの全プロセスに関与できます。',
        'skills' => '製品管理の経験とユーザー中心の思考がある方。'
      ],
      '人事マネージャー' => [
        'company' => '従業員の満足度向上を目指しています。',
        'benefits' => '充実した人材育成プログラムを提供しています。',
        'skills' => '採用と人材育成の経験がある方。'
      ],
      '経理担当' => [
        'company' => '正確な財務管理を重視しています。',
        'benefits' => 'キャリアアップの機会と専門的な研修が提供されます。',
        'skills' => '会計ソフトとエクセルに精通している方。'
      ],
      'コンテンツクリエイター' => [
        'company' => '魅力的なコンテンツを制作し、ブランド価値を高めています。',
        'benefits' => '創造性を発揮できる環境が整っています。',
        'skills' => '文章力とビジュアルコミュニケーション能力がある方。'
      ],
      'SEOスペシャリスト' => [
        'company' => '検索エンジン最適化の専門家が集まるチームです。',
        'benefits' => '最新のSEO技術を学べる機会が豊富です。',
        'skills' => 'キーワードリサーチとコンテンツ最適化の経験がある方。'
      ],
      'ITコンサルタント' => [
        'company' => '多様な業界に向けたITソリューションを提供しています。',
        'benefits' => '幅広いプロジェクトに関与でき、スキルアップが期待できます。',
        'skills' => 'IT戦略とプロジェクト管理の経験がある方。'
      ],
      'ビジネスアナリスト' => [
        'company' => 'ビジネス要件の分析とプロセス改善を専門としています。',
        'benefits' => 'クライアントと密接に連携して働くことができます。',
        'skills' => '要件定義とドキュメント作成の経験がある方。'
      ],
      'リサーチアシスタント' => [
        'company' => '革新的なリサーチを行う企業です。',
        'benefits' => '研究開発の最前線で働くことができます。',
        'skills' => 'データ分析と市場調査の経験がある方。'
      ],
      'テクニカルライター' => [
        'company' => '技術文書の作成を専門とするチームです。',
        'benefits' => '技術的な知識を活かして文章を書くことができます。',
        'skills' => '技術的な内容を分かりやすく伝える能力がある方。'
      ],
      'ビジュアルデザイナー' => [
        'company' => 'ビジュアルコミュニケーションを重視しています。',
        'benefits' => 'クリエイティブなプロジェクトに積極的に参加できます。',
        'skills' => 'Adobe Creative Suiteに精通し、ビジュアルデザインの経験がある方。'
      ],
      'サポートエンジニア' => [
        'company' => '技術サポートとトラブルシューティングを専門としています。',
        'benefits' => '顧客サポートの最前線で働くことができます。',
        'skills' => '問題解決能力とコミュニケーション能力がある方。'
      ],
      'クラウドエンジニア' => [
        'company' => '当社はクラウドコンピューティングソリューションを提供しています。',
        'benefits' => '最新のクラウド技術を学び、導入する機会が多い職場です。',
        'skills' => 'AWS、Azure、GCPなどのクラウドプラットフォームの経験がある方。'
      ],
      'デジタルマーケター' => [
        'company' => 'デジタルマーケティングに特化したチームです。',
        'benefits' => '新しいマーケティング手法を試す機会が多く、成長の機会があります。',
        'skills' => 'SNS広告や検索エンジンマーケティングの知識がある方。'
      ],
      'モバイルアプリ開発者' => [
        'company' => '革新的なモバイルアプリを開発する企業です。',
        'benefits' => 'モバイルプラットフォームの最新技術を使用する環境があります。',
        'skills' => 'iOSやAndroidのアプリ開発経験がある方。'
      ],
      'ソーシャルメディアマネージャー' => [
        'company' => 'ブランドのソーシャルメディア戦略を担当するチームです。',
        'benefits' => 'クリエイティブなキャンペーンを企画し実行する機会が豊富です。',
        'skills' => 'SNSプラットフォームの運用経験とコンテンツ作成能力がある方。'
      ],
      '広告運用スペシャリスト' => [
        'company' => 'オンライン広告キャンペーンの最適化を専門とする企業です。',
        'benefits' => 'データドリブンなアプローチで広告効果を最大化する環境です。',
        'skills' => 'Google AdsやFacebook Adsの運用経験がある方。'
      ],
    ];

    $title = $faker->randomElement(array_keys($jobDescriptions));
    $description = "### 会社について\n"
      . $jobDescriptions[$title]['company']
      . "\n\n" . "### 求人の魅力\n"
      . $jobDescriptions[$title]['benefits']
      . "\n\n" . "### 求める人材\n"
      . $jobDescriptions[$title]['skills'];
    $categories = [
      '人事' => ['人事マネージャー', '経理担当'],
      'コンサル' => ['ITコンサルタント'],
      '営業' => ['セールスエグゼクティブ'],
      'アナリスト' => ['ビジネスアナリスト', 'リサーチアシスタント', 'データサイエンティスト', 'システムアナリスト'],
      'デザイナー' => ['ビジュアルデザイナー', 'デザイナー', 'UI/UXデザイナー'],
      'エンジニア' => ['サポートエンジニア', 'クラウドエンジニア', 'モバイルアプリ開発者', 'ネットワークエンジニア', 'フロントエンドエンジニア', 'バックエンドエンジニア', 'プロダクトマネージャー', 'ソフトウェアエンジニア', 'プロジェクトマネージャー'],
      'マーケター' => ['広告運用スペシャリスト', 'ソーシャルメディアマネージャー', 'デジタルマーケター', 'コンテンツクリエイター', 'SEOスペシャリスト', 'マーケティングマネージャー'],
      'その他' => ['カスタマーサポート', 'テクニカルライター']
    ];

    $category = 'その他';
    foreach ($categories as $cat => $jobs) {
      if (in_array($title, $jobs)) {
        $category = $cat;
        break;
      }
    }
    $experience = $faker->randomElement(Job::$experience);
    $salary = match ($experience) {
      'エントリー' => $faker->numberBetween(3000000, 5000000),
      '中堅' => $faker->numberBetween(5000000, 8000000),
      'シニア' => $faker->numberBetween(8000000, 15000000),
      default => $faker->numberBetween(3000000, 15000000),
    };

    $prefixes = ['中央', '日本', '国際', '東洋', '第一', '東京', '新日本', '日本橋'];
    $suffixes = ['商事', '工業', '電機', 'システム', 'インターナショナル', '技研', '通信', '開発'];

    $prefix = $prefixes[array_rand($prefixes)];
    $suffix = $suffixes[array_rand($suffixes)];
    $companyName =
      '株式会社' . $prefix . $suffix;

    return [
      'title' => $title,
      'description' => $description,
      'salary' => $salary,
      'location' => $faker->city,
      // MEMO: enumでデータ管理している
      'category' => $category,
      'experience' => $experience,
    ];
  }
}
