<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use App\Models\Client;
use App\Models\Payment;
use Carbon\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'method' => ['required', 'string', 'max:255'],
            // 'amount' => ['required', 'string', 'max:255'],
            // 'trans_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {

            $first_name = $input['first_name'];
            $last_name = $input['last_name'];
            $gender = $input['gender'];
            $date_of_birth = $input['date_of_birth'];
            $phone_number = $input['phone_number'];
            $email = $input['email'];

            // $amount = $input['amount'];
            // $method = $input['method'];
            // $trans_id = $input['trans_id'];

            $time = Carbon::now();
            $month_name = $time->monthName;

            $client= new Client;
            $client->first_name = $first_name;
            $client->last_name = $last_name;
            $client->date_of_birth = $date_of_birth;
            $client->gender = $gender;
            $client->phone_number = $phone_number;
            $client->email = $email;
            $client->sub_exp_date = $time->addDays(30);
            $client->save();

            $client = Client::where('email',$email)->first();

            // $pay = new Payment;
            // $pay->name = $first_name. ' '. $last_name."'s ". $month_name . "'s subcription";
            // $pay->client_id = $client->id;
            // $pay->amount = $amount;
            // $pay->method = $method;
            // $pay->trans_id = $trans_id;
            // $pay->save();

            return tap(User::create([
                'name' => $first_name.' '.$last_name,
                'phone_number' => $phone_number,
                'user_type' => 'user',
                'email' => $email,
                'password' => Hash::make($input['password']),
                'last_seen' => $time,
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
