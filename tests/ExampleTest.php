<?php

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
//        $this->get('api/v1/students/generate-schedualer');
//
//        $this->assertEquals(
//            $this->app->version(), $this->response->getContent()
//        );

        $this->json('POST', '/api/v1/student/generate-schedualer', [
            'start_date' => '2019-12-18',
            'chosen_days' => [2,5,6],
            'sessions_count' => 2
        ])
            ->seeJson([
                'data' => [
                    "2019-12-22",
                    "2019-12-25",
                    "2019-12-26",
                    "2019-12-29",
                    "2020-01-01",
                    "2020-01-02"
                    ]
            ])
        ;

    }
}
