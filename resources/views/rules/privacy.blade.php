@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary pt-2">{{__('msg.Privacy Policy')}}</h2>
    <div>
        <p class="font-weight-bold">{{__('msg.BE3 Privacy Policy')}}</p>
        <p>
            {{__('msg.We care about your privacy and are committed to protecting your personal data. This Privacy Policy tells you how we treat your personal data, your rights to privacy and how you are legally protected. Please read this privacy policy carefully before using our services.')}}
        </p>
        <p>
            {{__('msg.The following terms are used in this Privacy Policy:')}}
        </p>
        <p>
            <span class="font-weight-bold">{{__('msg.Services:')}}</span> {{__('msg.any product, services, content, features, technologies or functionality, and all related websites, applications and services that we offer to you.')}}
        </p>
        <p>
            <span class="font-weight-bold">{{__('msg.Platform :')}}</span> {{__('msg.Websites, mobile applications, mobile sites or other online features through which we provide our services.')}}
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.1. Who are we?')}}</p>
        <p>
            {{__('msg.BE3 Egypt, a limited liability company')}}
        </p>
        <p>
            {{__('msg.It monitors your data in Egypt for the purpose of providing our services through the BE3 website and related sites and the mobile application of the Platform (collectively: the “Site”) in accordance with our “Terms of Use” (hereinafter referred to as “ BE3 ” or “We”). or "we" or "our" in this Privacy Policy.) Relevant contact details are set out in Section 13.')}}
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.2. What data do we collect about you?')}}</p>
        <div>
            <p class="font-weight-bold"><u>{{__('msg.2.1.Data provided through direct interactions')}}</u></p>
            <p class="font-weight-bold">{{__('msg.Registration and other account information')}}</p>
            <p>
                <ul class="col-10">
                    <li>
                        {{__('msg.If you registered using your Google account: your name, nickname and your email address;')}}
                    </li>
                    <li>
                        {{__('msg.If you register using your Facebook account: We collect your name and surname as it appears on your Facebook account and Facebook identifiers. If you have provided permission to Facebook through the in-app privacy option (which appears before registering with our Platform), we may collect your gender, age, or email ID depending on your permission;')}}
                    </li>
                    <li>
                        {{__('msg.If you applied using your cell phone number: cell phone number.')}}
                    </li>
                </ul>
            </p>
            <p>
                {{__('msg.Depending on the choices you make while logging into our services or during the process of subscribing to our services, you may choose to give the following additional personal data:')}}
                <ul class="col-10">
                    <li>
                        {{__('msg.your name')}}
                    </li>
                    <li>
                        {{__('msg.Your email address')}}
                    </li>
                    <li>
                        {{__('msg.your cell phone')}}
                    </li>
                    <li>
                        {{__('msg.Your credit card details in case you wish to purchase our paid services as specified in our usage policy.')}}
                    </li>
                </ul>
            </p>
            <p class="font-weight-bold">{{__('msg.Communicate through the chat feature on our platform')}}</p>
            <p>
                {{__('msg.When you use our chat feature to communicate with other users, we collect information that you choose to provide to other users through this feature.')}}
            </p>
        </div>
        <div>
            <p class="font-weight-bold"><u>{{__('msg.2.2.Data we collect automatically when you use our Services')}}</u></p>
            <p>
                {{__('msg.We automatically collect the following information about you, when you interact with our Platform or when you use our Services:')}}
            </p>
            <p class="font-weight-bold">{{__('msg.Device information')}}</p>
            <p>
                {{__('msg.We collect device-specific information such as operating system version and unique identifiers. For example, the name of the cellular network you\'re using, we associate device identifiers with your BE3 account.')}}
            </p>
            <p class="font-weight-bold">{{__('msg.Presence location information')}}</p>
            <p>
                {{__('msg.Depending on your device\'s permissions, if you post material on our Platform, we automatically collect and process information about your physical location. We use various technologies to determine location, including IP address, GPS, Wi-Fi, access points and cell towers. Your location data allows you to see user materials near you and helps you spread the materials within your location.')}}
            </p>
            <p class="font-weight-bold">{{__('msg.Customer and data registration')}}</p>
            <p>
                {{__('msg.Technical details, including your device\'s Internet Protocol (IP) address, time zone, and operating system. We will also store your login information, (date of registration, date of last password change and date of last successful login), type and version of your browser.')}}
            </p>
            <p class="font-weight-bold">{{__('msg.Online activity data')}}</p>
            <p>
                {{__('msg.We collect information about your activity on our Platform, including the sites from which you accessed our Platform, the date and time tag of each visit, the searches you have made, the programs or ad banners you have clicked on, the length of your visit and the order in which you visit content on our Platform.')}}
            </p>
            <p class="font-weight-bold">{{__('msg.Cookies , cookies and similar technologies')}}</p>
            <p>
                {{__('msg.We use cookies to manage our user sessions, to store your language preferences and to deliver you relevant advertisements. " Cookies " are small text files that are transmitted by a web server to your device\'s main data storage device or device. Cookies may be used to collect the date and time of your visit, your browsing history, your preferences and your username. You can set your browser to refuse all or some cookies, or to alert you when websites set or access cookies. If you disable or refuse cookies, please note that some parts of our Services/Platform may be inaccessible or our Service will not function properly.')}}
            </p>
        </div>
        <div>
            <p class="font-weight-bold"><u>{{__('msg.2.3.Third Party Data or Publicly Available Sources')}}</u></p>
            <p>
                {{__('msg.We may receive personal data about you from various third parties and public sources. If you would like more information on this matter, please contact us using the relevant contact details provided in Section 13.')}}
            </p>
        </div>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.3. Do we collect data from children?')}}</p>
        <p>
            {{__('msg.Our Services are not intended for children under 18, and we do not collect data from anyone under 18. If we become aware that a person under the age of 18 has provided personal data, we will delete it immediately.')}}
        </p>
        <p>
            {{__('msg.If you are located in Egypt and under the age of 18, we are not permitted to contract with you directly. If you are located in Egypt and under the age of 18, when you agree to this Privacy Policy, you acknowledge and agree that your guardian has read and agreed to its terms on your behalf. If we ask for your consent to process your personal data for a particular purpose in accordance with this Privacy Policy, your guardian is required to give consent on your behalf.')}}
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.4. Why do we process your personal information?')}}</p>
        <p>
            {{__('msg.We use your personal data only when permitted by law. We will often use your personal data in the following cases:')}}
            <ul  class="col-10">
                <li>
                    {{__('msg.When we need to perform a contract and we are about to perform it or we have done so with you.')}}
                </li>
                <li>
                    {{__('msg.When it is necessary to improve our services based on our legitimate interests and in order to provide you with a platform that is reliable and secured.')}}
                </li>
                <li>
                    {{__('msg.When we need to comply with a legal or regulatory obligation.')}}
                </li>
            </ul>
        </p>
        <p>
            {{__('msg.In some cases, we may also process your personal data based on your consent. If we do this, we will inform you of the purpose and category of personal data to be processed at the time we seek your consent.')}}
        </p>
        <p>
            {{__('msg.Below we have set out a description of the ways in which we use your personal data.')}}
        </p>
        <div>
            <p class="font-weight-bold"><u>{{__('msg.4.1. In order to provide access and delivery of services through our platform')}}</u></p>
            <ul  class="col-10">
                <li>
                    {{__('msg.If you log in using your cell phone number or email ID, we use your first and last name, cell phone number, and/or email address to identify you as a user and provide access to our Platform.')}}
                </li>
                <li>
                    {{__('msg.If you log in using your Facebook account, we use your name and last name from your Facebook profile and Facebook email address to identify you as a user and provide access to our Platform.')}}
                </li>
            </ul>
            <p>
                {{__('msg.The above login information data is also used by us to provide our services to you in accordance with our terms of use.')}}
            </p>
            <p>
                {{__('msg.We use your email address and cell phone number (via SMS) to make suggestions and recommendations to you about our services or third-party services that may be of interest to you. We process the above information for proper performance of our contract with you and on the basis of our legitimate interest in carrying out marketing activities to offer you any products or services that may be of interest to you.')}}
            </p>
        </div>
        <div>
            <p class="font-weight-bold"><u>{{__('msg.4.2. In order to improve your experience on the platform')}}</u></p>
            <p>
                {{__('msg.We use the data of your visits to the Internet to:')}}
                <ul  class="col-10">
                    <li>
                        {{__('msg.To provide you with relevant content such as giving you more relevant search results when you use our Services;')}}
                    </li>
                    <li>
                        {{__('msg.To determine how much time you spend on our Platform and in what way you move through our Platform in order to understand your interests and to improve our Services based on this data. For example, we may give you suggestions about what content you can visit based on the contents you have clicked on')}}
                    </li>
                    <li>
                        {{__('msg.To monitor and report on the effectiveness of campaign communication to our business partners and to analyze internal activities.')}}
                    </li>
                </ul>
            </p>
            <p>
                {{__('msg.We use your location data for the following purposes:')}}
                <ul class="col-10">
                    <li>
                        {{__('msg.collect anonymous and aggregate information about the characteristics and behavior of BE3 users including for the purposes of business analysis, segmentation and development of anonymous profiles.')}}
                    </li>
                    <li>
                        {{__('msg.To improve the performance of our Services and to personalize the content we address to you. For example, with the help of location data, we display listings of advertisements located near you to improve the buying experience, and to measure and monitor your interaction with third-party advertisements that we place on our Platform.')}}
                    </li>
                </ul>
            </p>
            <p>
                {{__('msg.With the help of your login information which includes your email id and phone number, we identify the different devices (such as desktop, mobile and tablets) that you use to access our Platform. This allows us to link your activity on our Platform across devices and helps us provide a seamless experience for you no matter what device you\'re using.')}}
            </p>
            <p>
                {{__('msg.We process the above information on the basis of our legitimate interests in order to improve your experience on our Platform and to properly perform our contract with you.')}}
            </p>
        </div>
        <div>
            <p class="font-weight-bold"><u>{{__('msg.4.3 In order to provide you with a reliable and trusted platform')}}</u></p>
            <ul class="col-10">
                <li>
                    {{__('msg.We use your cell phone number, registry login data, and unique device identifiers to administer and maintain our Platform (including troubleshooting, data analysis, testing, fraud prevention, system maintenance, support, reporting and data hosting).')}}
                </li>
                <li>
                    {{__('msg.We analyze your communications through the chat feature in order to prevent fraud and to enhance safety by blocking unwanted or offensive messages that may be sent to you by any other user.')}}
                </li>
            </ul>
            <p>
                {{__('msg.We also process the above information for appropriate performance of our contract with you, and to improve our services based on our legitimate interests to prevent fraud.')}}
            </p>
        </div>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.5. How do we let you know about changes to our privacy policy?')}}</p>
        <p>
            {{__('msg.We may from time to time modify this Privacy Policy, post the modifications on this page and notify you by e-mail or through our Platform. If you or your guardian (as the case may be) does not agree to the modifications, you can close your account by going to the account combination and choosing to select delete account.')}}
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.6. Your rights')}}</p>
        <p>
            {{__('msg.You have the following legal rights regarding your personal data based on how we interact with you:')}}
            <ul class="col-10">
                <li>
                    {{__('msg.The right to request access to your personal data (commonly known as a “data subject access request”). This allows you to obtain a copy of the personal data we hold about you and to verify that we are lawfully processing it.')}}
                </li>
                <li>
                    {{__('msg.The right to request correction of any data we hold about you. This enables you to obtain incomplete, inaccurate, outdated or misleading data that we have about you or the data being processed is incompatible with the processing of the stated purpose, or the data being processed is prohibited, corrected, updated or deleted, and that we may need to verify of the accuracy of the new data you provide to us.')}}
                </li>
                <li>
                    {{__('msg.The right to object to the processing of your personal data at any time, and such objection must be made on legitimate grounds as this does not affect the legality of any processing we have already carried out based on the consent previously provided or compliance with applicable law.')}}
                </li>
            </ul>
        </p>
        <p>
            <span class="font-weight-bold">{{__('msg.Usually, there is no fee to pay:')}}</span> {{__('msg.you will not have to pay a fee to access your personal data (or to exercise any of your other rights). However, we may charge a reasonable fee for the cost of providing a copy of the data or if your request is discreet, repetitive or excessive. Alternatively, we may refuse to comply with your request in these circumstances.')}}
        </p>
        <p>
            <span class="font-weight-bold">{{__('msg.Response time limit:')}}</span> {{__('msg.We try to respond to all legitimate requests within one month. From time to time, it may take more than a month if your request is particularly complex or if you have placed multiple requests. In this case, we will notify you and provide you with updated information.')}}
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.7. Communication and Marketing')}}</p>
        <p>
            {{__('msg.We will contact you by email, SMS or through an app notification in connection with our Services/Platform to confirm your registration, to notify you if your listing has become active/expired and for other transaction messages related to our Services. Since it is necessary for us to provide you with these transactional messages, you may not be able to opt out of such messages.')}}
        </p>
        <p>
            {{__('msg.However, you can ask us to stop sending you marketing communications at any time by clicking on the unsubscribe link in the email or SMS sent to you or by contacting us via the Help Center')}}
        </p>
        <p>
            {{__('msg.You may receive marketing communications from us if you have:')}}
            <ul class="col-10">
                <li>
                    {{__('msg.You requested this information from us.')}}
                </li>
                <li>
                    {{__('msg.you use our Platform or Services.')}}
                </li>
                <li>
                    {{__('msg.You have provided us with your details when you entered the Contest.')}}
                </li>
                <li>
                    {{__('msg.I signed up for a promotion.')}}
                </li>
            </ul>
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.8. Who do we share your data with ?')}}</p>
        <p>
            {{__('msg.We may have to share your personal data with the parties set out below for the purposes specified in Section 4 above.')}}
        </p>
        <p>
            <span class="font-weight-bold">{{__('msg.Providers, data analysis and marketing :')}}</span> {{__('msg.In order to improve our services, we will sometimes share your non-identifiable information with analytics providers that help us analyze how people use our Platform/Service. We share your information with them in a non-identifiable form to monitor and report on the effectiveness of campaign delivery to our business partners and for internal business analysis. For more details about analytics providers, please refer to our Policy on Cookies and Similar Technologies. We may share your contact information in an identifiable form with third party service providers for the purposes of facilitating our marketing communications to you. These third-party service providers must handle your information on your behalf, for BE3, and in accordance with our instructions. They will not have independent rights in respect of it. They will comply with the terms of this Privacy Policy as well as their data processing obligations in accordance with applicable data protection laws and/or a contractual obligation.')}}
        </p>
        <p>
            <span class="font-weight-bold">{{__('msg.Law Enforcement Authorities, Regulatory Bodies, and Others:')}}</span> {{__('msg.We may disclose your Personal Data to law enforcement authorities, regulators, governmental or public bodies, and other relevant third parties to comply with any legal or regulatory requirements.')}}
        </p>
        <p>
            {{__('msg.We may choose to sell, transfer or merge parts of our business or our assets. Alternatively, we may seek to acquire or merge with other businesses. If there is a change in our business, the new owners may use your personal data in the same manner as described in this Privacy Policy.')}}
        </p>
        <p>
            <span class="font-weight-bold">{{__('msg.Publicly Available Information :')}}</span> {{__('msg.When you post an item for sale using our Services, you may choose to make certain personal information visible to other BE3 users. This may include your first and last name, your email address, your location, and your contact number. Please note that any information you provide to other users can always be shared by them with others, so please exercise discretion in this regard.')}}
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.9. International Transfers')}}</p>
        <p>
            {{__('msg.You agree that we may transfer your personal data to third parties inside and outside Egypt. When we transfer your personal data outside Egypt, we ensure that we receive a similar degree of protection by ensuring that at least one of the following safeguards is implemented:')}}
            <ul class="col-10">
                <li>
                    {{__('msg.countries that have been deemed to provide a similar level of protection Appropriate protection of personal data by the European Commission.')}}
                </li>
                <li>
                    {{__('msg.Adequate safeguards are put in place to protect personal data, such as specific contract terms.')}}
                </li>
                <li>
                    {{__('msg.Where we use the Service, and service providers residing in the United States, we may transfer data to them if they are part of the Privacy Shield You can obtain a copy of the relevant and enforceable warranties by contacting us through the Help Center')}}
                </li>
            </ul>
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.10. Where and when will your data be stored?')}}</p>
        <p>
            {{__('msg.The data we collect about you may be stored and processed inside and outside Egypt in secure servers in order to provide the best possible user experience. For example - to create a quick website or mobile app. We will only retain your personal data for as long as it is necessary to fulfill the purposes for which we collected it, including for the purposes of satisfying any legal, accounting or reporting requirements. To determine the appropriate retention period for personal data, we consider the amount, nature and sensitivity of the personal data, the potential risk of harm resulting from unauthorized use or disclosure of your personal data, the purposes for which we process your personal data and whether we can achieve those purposes through other means, and legal requirements applicable. If you have any questions regarding the retention period of your data, please contact us through the Help Center')}}
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.11. Technical and organizational measures and protection treatment')}}</p>
        <p>
            {{__('msg.All information we receive about you is stored on secure servers and we have implemented appropriate technical and organizational measures necessary to protect your personal data. BE3 continually evaluates the security of its network and the adequacy of its internal information security program designed to')}}
            <ul class="col-10">
                <li>
                    {{__('msg.help secure your data against accidental or unlawful loss, inadvertent or unlawful access or disclosure,')}}
                </li>
                <li>
                    {{__('msg.identify reasonably anticipated risks to the security of BE3 Network,')}}
                </li>
                <li>
                    {{__('msg.reduce security risks, including risk assessment and ongoing testing. In addition, we ensure that all payment data is encrypted using SSL technology. Please note that despite the measures we have implemented to protect your data, the transmission of data over the Internet or other open networks is never completely secure and there is a risk that your personal data may be accessed by unauthorized third parties.')}}
                </li>
            </ul>
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.12. Links to third party websites')}}</p>
        <p>
            {{__('msg.Our Platform may contain links to third party websites or applications. If you click on one of these links, please note that each one has its own privacy policy. We do not control these websites/applications and are not responsible for these policies. When you leave our Platform, we encourage you to read the privacy notice of each website you visit.')}}
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.13. Contact')}}</p>
        <p>
            {{__('msg.You can contact us for any privacy issues via this link')}} <a class="font-weight-bold" href="{{url('contact')}}">{{__('msg.contact us')}}</a>
        </p>
    </div>
    <div>
        <p class="font-weight-bold">{{__('msg.14. Privacy Policy Amendments')}}</p>
        <p>
            {{__('msg.We may amend the Privacy Policy from time to time to keep it updated in accordance with legal requirements and the way in which we operate our business. Please check this page regularly for the latest version of this Privacy Policy. If we make material changes to the Privacy Policy, we will notify you by Notice on our website or app, or email (" Modification Notice ")')}}.
        </p>
        <p>
            {{__('msg.Your continued use of our Services after a modification or notice of modification indicates your or your guardian\'s consent (as the case may be) to any modification.')}}
        </p>
    </div>

</div>
@endsection
