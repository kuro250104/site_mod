<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stages = [
            [2, 'AM275 BYC', 1, '2024-01-02 09:49:17', '2024-01-02 09:49:17'],
            [3, 'AM275 PS', 1, '2024-01-02 09:49:27', '2024-01-02 09:49:27'],
            [4, 'AM275 P2S', 1, '2024-01-02 09:49:37', '2024-01-02 09:49:37'],
            [5, 'AM275 P3S', 1, '2024-01-02 09:49:43', '2024-01-02 09:49:43'],
            [6, 'AM2751 H', 1, '2024-01-02 09:49:48', '2024-01-02 09:49:48'],
            [7, 'AM2751 S', 1, '2024-01-02 09:50:01', '2024-01-02 09:50:01'],
            [8, 'AM2752 BH', 1, '2024-01-02 09:50:10', '2024-01-02 09:50:10'],
            [9, 'AM2752 H', 1, '2024-01-02 09:50:17', '2024-01-02 09:50:17'],
            [10, 'AM2753 H', 1, '2024-01-02 09:50:24', '2024-01-02 09:50:24'],
            [11, 'AM2753 S', 1, '2024-01-02 09:50:31', '2024-01-02 09:50:31'],
            [12, 'BCA750 COND', 2, '2024-01-02 09:53:55', '2024-01-02 09:53:55'],
            [13, 'BCA7501 SLT', 2, '2024-01-02 09:54:21', '2024-01-02 09:54:21'],
            [14, 'BCA7502 SLT', 2, '2024-01-02 09:54:29', '2024-01-02 09:54:29'],
            [15, 'BCA7503 SLT', 2, '2024-01-02 09:54:36', '2024-01-02 09:54:36'],
            [16, 'BIN749 COND', 4, '2024-01-02 10:24:33', '2024-01-02 10:24:33'],
            [17, 'BIN7493 CONC', 4, '2024-01-02 10:24:41', '2024-01-02 10:24:41'],
            [18, 'BIN7494 CONC', 4, '2024-01-02 10:24:50', '2024-01-02 10:24:50'],
            [19, 'BIN7495 CONC', 4, '2024-01-02 10:24:56', '2024-01-02 10:24:56'],
            [20, 'BIN7495 DIST', 4, '2024-01-02 10:25:02', '2024-01-02 10:25:02'],
            [21, 'BIN7495 S', 4, '2024-01-02 10:25:08', '2024-01-02 10:25:08'],
            [22, 'CAV718 7HP COND', 5, '2024-01-02 10:25:24', '2024-01-02 10:25:24'],
            [23, 'CAV718 7M COND', 5, '2024-01-02 10:25:41', '2024-01-02 10:25:41'],
            [24, 'CAV718 8HP COND', 5, '2024-01-02 10:25:53', '2024-01-02 10:25:53'],
            [25, 'CAV7181 7HP SLT', 5, '2024-01-02 10:26:02', '2024-01-02 10:26:02'],
            [26, 'CAV7181 8HP SLT', 5, '2024-01-02 10:26:13', '2024-01-02 10:26:13'],
            [27, 'CAV728 7HP7 COND', 6, '2024-01-02 10:26:43', '2024-01-02 10:26:43'],
            [28, 'CAV7281 SLT', 6, '2024-01-02 10:26:54', '2024-01-02 10:26:54'],
            [29, 'CAV729 7HP5 COND', 6, '2024-01-02 10:27:13', '2024-01-02 10:27:13'],
            [30, 'CH261 CHI', 7, '2024-01-02 10:27:46', '2024-01-02 10:27:46'],
            [31, 'CH261 CHI BYC', 7, '2024-01-02 10:27:58', '2024-01-02 10:27:58'],
            [32, 'CH261 CHI EUR', 7, '2024-01-02 10:28:08', '2024-01-02 10:28:08'],
            [33, 'CS418 COND', 8, '2024-01-02 13:07:39', '2024-01-02 13:07:39'],
            [34, 'CS418 SLT', 8, '2024-01-02 13:07:51', '2024-01-02 13:07:51'],
            [35, 'DMA685 CONC', 9, '2024-01-02 13:08:10', '2024-01-02 13:08:10'],
            [36, 'HTS723S COND', 10, '2024-01-02 13:08:27', '2024-01-02 13:08:27'],
            [37, 'HTS723S DIST', 10, '2024-01-02 13:08:42', '2024-01-02 13:08:42'],
            [38, 'HTS723S S', 10, '2024-01-02 13:08:58', '2024-01-02 13:08:58'],
            [39, 'HTS724 S', 10, '2024-01-02 13:09:17', '2024-01-02 13:09:17'],
            [40, 'HTS7243 CONC', 10, '2024-01-02 13:09:28', '2024-01-02 13:09:28'],
            [41, 'HTS7243 COND', 10, '2024-01-02 13:09:37', '2024-01-02 13:09:37'],
            [42, 'HTS7243 DIST', 10, '2024-01-02 13:09:45', '2024-01-02 13:09:45'],
            [43, 'HTS7243 S', 10, '2024-01-02 13:09:52', '2024-01-02 13:09:52'],
            [44, 'HTS725 S', 10, '2024-01-02 13:10:01', '2024-01-02 13:10:01'],
            [45, 'HTS7253 CONC', 10, '2024-01-02 13:10:09', '2024-01-02 13:10:09'],
            [46, 'HTS7253 COND', 10, '2024-01-02 13:10:18', '2024-01-02 13:10:18'],
            [47, 'HTS7253 DIST', 10, '2024-01-02 13:10:26', '2024-01-02 13:10:26'],
            [48, 'HTS7253 S', 10, '2024-01-02 13:10:35', '2024-01-02 13:10:35'],
            [49, 'HTS726 S', 10, '2024-01-02 13:10:44', '2024-01-02 13:10:44'],
            [50, 'HTS7263 CONC', 10, '2024-01-02 13:10:54', '2024-01-02 13:10:54'],
            [51, 'HTS7263 COND', 10, '2024-01-02 13:11:03', '2024-01-02 13:11:03'],
            [52, 'HTS7263 DIST', 10, '2024-01-02 13:11:11', '2024-01-02 13:11:11'],
            [53, 'HTS7263 S', 10, '2024-01-02 13:11:20', '2024-01-02 13:11:20'],
            [54, 'HTS727 S', 10, '2024-01-02 13:11:29', '2024-01-2 13:11:29'],
            [55, 'HTS7273 CONC', 10, '2024-01-02 13:11:37', '2024-01-02 13:11:37'],
            [56, 'HTS7273 COND', 10, '2024-01-02 13:11:46', '2024-01-02 13:11:46'],
            [57, 'HTS7273 DIST', 10, '2024-01-02 13:11:55', '2024-01-02 13:11:55'],
            [58, 'HTS7273 S', 10, '2024-01-02 13:12:03', '2024-01-02 13:12:03'],
            [59, 'HTS728 S', 10, '2024-01-02 13:12:11', '2024-01-02 13:12:11'],
            [60, 'HTS7283 CONC', 10, '2024-01-02 13:12:20', '2024-01-02 13:12:20'],
            [61, 'HTS7283 COND', 10, '2024-01-02 13:12:28', '2024-01-02 13:12:28'],
            [62, 'HTS7283 DIST', '10, 2024-01-02 13:12:38', '2024-01-02 13:12:38'],
            [63, 'HTS7283 S', 10, '2024-01-02 13:12:47', '2024-01-02 13:12:47'],
            [64, 'HTS729 S', 10, '2024-01-02 13:12:56', '2024-01-02 13:12:56'],
            [65, 'HTS7293 CONC', 10, '2024-01-02 13:13:05', '2024-01-02 13:13:05'],
            [66, 'HTS7293 COND', 10, '2024-01-02 13:13:13', '2024-01-02 13:13:13'],
            [67, 'HTS7293 DIST', 10, '2024-01-02 13:13:22', '2024-01-02 13:13:22'],
            [68, 'HTS7293 S', 10, '2024-01-02 13:13:31', '2024-01-02 13:13:31'],
            [69, 'HTS730 S', 10, '2024-01-02 13:13:40', '2024-01-02 13:13:40'],
            [70, 'HTS7303 CONC', 10, '2024-01-02 13:13:48', '2024-01-02 13:13:48'],
            [71, 'HTS7303 COND', 10, '2024-01-02 13:13:57', '2024-01-02 13:13:57'],
            [72, 'HTS7303 DIST', 10, '2024-01-02 13:', 'lalalala'],
            [73, 'HTS7303 S', 10, '2024-01-02 13:14:06', '2024-01-02 13:14:06'],
            [74, 'HTS731 S', 10, '2024-01-02 13:14:15', '2024-01-02 13:14:15'],
            [75, 'HTS7313 CONC', 10, '2024-01-02 13:14:23', '2024-01-02 13:14:23'],
            [76, 'HTS7313 COND', 10, '2024-01-02 13:14:32', '2024-01-02 13:14:32'],
            [77, 'HTS7313 DIST', 10, '2024-01-02 13:14:41', '2024-01-02 13:14:41'],
            [78, 'HTS7313 S', 10, '2024-01-02 13:14:50', '2024-01-02 13:14:50'],
            [79, 'HTS732 S', 10, '2024-01-02 13:14:59', '2024-01-02 13:14:59'],
            [80, 'HTS7323 CONC', 10, '2024-01-02 13:15:08', '2024-01-02 13:15:08'],
            [81, 'HTS7323 COND', 10, '2024-01-02 13:15:16', '2024-01-02 13:15:16'],
            [82, 'HTS7323 DIST', 10, '2024-01-02 13:15:25', '2024-01-02 13:15:25'],
            [83, 'HTS7323 S', 10, '2024-01-02 13:15:34', '2024-01-02 13:15:34'],
            [84, 'HTS733 S', 10, '2024-01-02 13:15:43', '2024-01-02 13:15:43'],
            [85, 'HTS7333 CONC', 10, '2024-01-02 13:15:52', '2024-01-02 13:15:52'],
            [86, 'HTS7333 COND', 10, '2024-01-02 13:16:00', '2024-01-02 13:16:00'],
            [87, 'HTS7333 DIST', 10, '2024-01-02 13:16:09', '2024-01-02 13:16:09'],
            [88, 'HTS7333 S', 10, '2024-01-02 13:16:18', '2024-01-02 13:16:18'],
            [89, 'HTS734 S', 10, '2024-01-02 13:16:27', '2024-01-02 13:16:27'],
            [90, 'HTS7343 CONC', 10, '2024-01-02 13:16:35', '2024-01-02 13:16:35'],
            [91, 'HTS7343 COND', 10, '2024-01-02 13:16:44', '2024-01-02 13:16:44'],
            [92, 'HTS7343 DIST', 10, '2024-01-02 13:16:53', '2024-01-02 13:16:53'],
            [93, 'HTS7343 S', 10, '2024-01-02 13:17:02', '2024-01-02 13:17:02'],
            [94, 'HTS735 S', 10, '2024-01-02 13:17:11', '2024-01-02 13:17:11'],
            [95, 'HTS7353 CONC', 10, '2024-01-02 13:17:19', '2024-01-02 13:17:19'],
            [96, 'HTS7353 COND', 10, '2024-01-02 13:17:28', '2024-01-02 13:17:28'],
            [97, 'HTS7353 DIST', 10, '2024-01-02 13:17:37', '2024-01-02 13:17:37'],
            [98, 'HTS7353 S', 10, '2024-01-02 13:17:46', '2024-01-02 13:17:46'],
            [99, 'HTS736 S', 10, '2024-01-02 13:17:55', '2024-01-02 13:17:55'],
            [100, 'HTS7363 CONC', 10, '2024-01-02 13:18:03', '2024-01-02 13:18:03'],
            [101, 'HTS7363 COND', 10, '2024-01-02 13:18:12', '2024-01-02 13:18:12'],
            [102, 'HTS7363 DIST', 10, '2024-01-02 13:18:21', '2024-01-02 13:18:21'],
            [103, 'HTS7363 S', 10, '2024-01-02 13:18:30', '2024-01-02 13:18:30'],
            [104, 'HTS737 S', 10, '2024-01-02 13:18:39', '2024-01-02 13:18:39'],
            [105, 'HTS7373 CONC', 10, '2024-01-02 13:18:47', '2024-01-02 13:18:47'],
            [106, 'HTS7373 COND', 10, '2024-01-02 13:18:56', '2024-01-02 13:18:56'],
            [107, 'HTS7373 DIST', 10, '2024-01-02 13:19:05', '2024-01-02 13:19:05'],
            [108, 'HTS7373 S', 10, '2024-01-02 13:19:14', '2024-01-02 13:19:14'],
            [109, 'HTS738 S', 10, '2024-01-02 13:19:22', '2024-01-02 13:19:22'],
            [110, 'HTS7383 CONC', 10, '2024-01-02 13:19:31', '2024-01-02 13:19:31'],
            [111, 'HTS7383 COND', 10, '2024-01-02 13:19:40', '2024-01-02 13:19:40'],
            [112, 'HTS7383 DIST', 10, '2024-01-02 13:19:49', '2024-01-02 13:19:49'],
            [113, 'HTS7383 S', 10, '2024-01-02 13:19:58', '2024-01-02 13:19:58'],
            [114, 'HTS739 S', 10, '2024-01-02 13:20:07', '2024-01-02 13:20:07'],
        ];

        foreach ($stages as $stage) {
            \DB::table('stages')->insert($stage);
        }
    }
}
