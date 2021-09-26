@extends('layouts.app')

@section('content')
<div class="safety">
    <div class="container">
        <div class="pt-4">
            <h3>
                <i class="far fa-question-circle"></i>
                How to Complete a Deal Safely?
            </h3>
            <ul>
                <li>
                    Inform the buyer of any defects in the item, in order to avoid accusing you of being deceptive.
                </li>
                <li>
                    Agree with the buyer to use a familiar and easy payment methods, and we prefer cash.
                </li>
                <li>
                    Never share your personal information or data, especially those related to your bank account.
                </li>
                <li>
                    Please do not add your email address in the description to protect your privacy.
                </li>
                <li>
                    If the buyer keeps changing the meeting place or calls you from a different number each time, avoid dealing with him.
                </li>
                <li>
                    For the sake of your safety, if the buyer remains seated in his car, it is preferable to ask him to get off to inspect the goods at the meeting place.
                </li>
            </ul>
        </div>
        <div class="mt-4">
            <h3>
                <i class="far fa-question-circle"></i>
                How can I complete the purchase safely?
            </h3>
            <ul>
                <li>
                    Make sure to meet the seller in safe areas such as a metro station, shopping mall or any public place.
                </li>
                <li>
                    Inspect the item before completing the transaction, as this way you can avoid fraud. This also applies to rental housing units.
                </li>
                <li>
                    Trust your instincts and beware of unrealistic offers, for example, if you notice that the deal is very tempting, it is most likely a fraud.
                </li>
                <li>
                    Don't fall into the trap of lower prices than they normally are. Compare the displayed prices with the prices in the market.
                </li>
                <li>
                    Do not deal with sellers who insist on knowing personal information about you, such as your age and bank account.
                </li>
                <li>
                    Never send a partial or full payment in advance, or use a credit card to pay before receiving your item.
                </li>
                <li>
                    And remember this golden rule, make sure to complete the deal face to face with the seller.
                </li>
            </ul>
        </div>
        <div class="mt-4">
            <h3>
                <i class="far fa-question-circle"></i>
                How can I keep my account secure?
            </h3>
            <ul>
                <li>
                    Do not share your account login information with anyone. Choose a difficult password, consisting of at least 6 letters, numbers and punctuation marks. To ensure your protection, do not choose the password-save feature in your web browser. If you notice that someone knows your password, change it quickly. Here are some additional precautions...
                </li>
                <li>
                    Be aware if the price of the item is too low compared to its market price.
                </li>
                <li>
                    Avoid dealing with a seller/buyer who refuses to complete a face-to-face or cash-on-delivery transaction.
                </li>
                <li>
                    Stay alert when dealing with a user who has recently created an account on BE3.
                </li>
            </ul>
        </div>
        <div class="mt-4">
            <h3>
                <i class="far fa-question-circle"></i>
                What should I do if I doubted in the credibility of a user's ad?
            </h3>
            <ul class="mb-0 pb-4">
                <li>
                    If you doubt the credibility of a user's ad on BE3, please
                    <a class="text-white font-weight-bold" href="{{url('contact')}}">contact us</a> immediately. In addition, we encourage you to turn to the police if you fall into the trap of fraud. We are ready to provide the police with any information that serves the investigation, upon their official request. Hurry up to fill out an application so that we can block the person's account after doing the necessary investigations.
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
