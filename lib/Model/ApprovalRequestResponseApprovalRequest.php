<?php
/**
 * ApprovalRequestResponseApprovalRequest
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * freee API
 *
 * <h1 id=\"freee_api\">freee API</h1> <hr /> <h2 id=\"start_guide\">スタートガイド</h2>  <p>freee API開発がはじめての方は<a href=\"https://developer.freee.co.jp/getting-started\">freee API スタートガイド</a>を参照してください。</p>  <hr /> <h2 id=\"specification\">仕様</h2>  <pre><code>【重要】会計freee APIの新バージョンについて 2020年12月まで、2つのバージョンが利用できる状態です。古いものは2020年12月に利用不可となります。<br> 新しいAPIを利用するにはリクエストヘッダーに以下を指定します。 X-Api-Version: 2020-06-15<br> 指定がない場合は2020年12月に廃止予定のAPIを利用することとなります。<br> 【重要】APIのバージョン指定をせずに利用し続ける場合 2020年12月に新しいバージョンのAPIに自動的に切り替わります。 詳細は、<a href=\"https://developer.freee.co.jp/release-note/2948\" target=\"_blank\">リリースノート</a>をご覧ください。<br> 旧バージョンのAPIリファレンスを確認したい場合は、<a href=\"https://freee.github.io/freee-api-schema/\" target=\"_blank\">旧バージョンのAPIリファレンスページ</a>をご覧ください。 </code></pre>  <h3 id=\"api_endpoint\">APIエンドポイント</h3>  <p>https://api.freee.co.jp/ (httpsのみ)</p>  <h3 id=\"about_authorize\">認証について</h3> <p>OAuth2.0を利用します。詳細は<a href=\"https://developer.freee.co.jp/docs\" target=\"_blank\">ドキュメントの認証</a>パートを参照してください。</p>  <h3 id=\"data_format\">データフォーマット</h3>  <p>リクエスト、レスポンスともにJSON形式をサポートしていますが、詳細は、API毎の説明欄（application/jsonなど）を確認してください。</p>  <h3 id=\"compatibility\">後方互換性ありの変更</h3>  <p>freeeでは、APIを改善していくために以下のような変更は後方互換性ありとして通知なく変更を入れることがあります。アプリケーション実装者は以下を踏まえて開発を行ってください。</p>  <ul> <li>新しいAPIリソース・エンドポイントの追加</li> <li>既存のAPIに対して必須ではない新しいリクエストパラメータの追加</li> <li>既存のAPIレスポンスに対する新しいプロパティの追加</li> <li>既存のAPIレスポンスに対するプロパティの順番の入れ変え</li> <li>keyとなっているidやcodeの長さの変更（長くする）</li> </ul>  <h3 id=\"common_response_header\">共通レスポンスヘッダー</h3>  <p>すべてのAPIのレスポンスには以下のHTTPヘッダーが含まれます。</p>  <ul> <li> <p>X-Freee-Request-ID</p> <ul> <li>各リクエスト毎に発行されるID</li> </ul> </li> </ul>  <h3 id=\"common_error_response\">共通エラーレスポンス</h3>  <ul> <li> <p>ステータスコードはレスポンス内のJSONに含まれる他、HTTPヘッダにも含まれる</p> </li> <li> <p>一部のエラーレスポンスにはエラーコードが含まれます。<br>詳細は、<a href=\"https://developer.freee.co.jp/tips/faq/40x-checkpoint\">HTTPステータスコード400台エラー時のチェックポイント</a>を参照してください</p> </li> <p>type</p>  <ul> <li>status : HTTPステータスコードの説明</li>  <li>validation : エラーの詳細の説明（開発者向け）</li> </ul> </li> </ul>  <p>レスポンスの例</p>  <pre><code>  {     &quot;status_code&quot; : 400,     &quot;errors&quot; : [       {         &quot;type&quot; : &quot;status&quot;,         &quot;messages&quot; : [&quot;不正なリクエストです。&quot;]       },       {         &quot;type&quot; : &quot;validation&quot;,         &quot;messages&quot; : [&quot;Date は不正な日付フォーマットです。入力例：2013-01-01&quot;]       }     ]   }</code></pre>  </br>  <h3 id=\"api_rate_limit\">API使用制限</h3>    <p>freeeは一定期間に過度のアクセスを検知した場合、APIアクセスをコントロールする場合があります。</p>   <p>その際のhttp status codeは403となります。制限がかかってから10分程度が過ぎると再度使用することができるようになります。</p>  <h4 id=\"reports_api_endpoint\">/reportsエンドポイント</h4>  <p>freeeは/reportsエンドポイントに対して1秒間に10以上のアクセスを検知した場合、APIアクセスをコントロールする場合があります。その際のhttp status codeは429（too many requests）となります。</p>  <p>レスポンスボディのmetaプロパティに以下を含めます。</p>  <ul>   <li>設定されている上限値</li>   <li>上限に達するまでの使用可能回数</li>   <li>（上限値に達した場合）使用回数がリセットされる時刻</li> </ul>  <h3 id=\"plan_api_rate_limit\">プラン別のAPI Rate Limit</h3>   <table border=\"1\">     <tbody>       <tr>         <th style=\"padding: 10px\"><strong>会計freeeプラン名</strong></th>         <th style=\"padding: 10px\"><strong>事業所とアプリケーション毎に1日でのAPIコール数</strong></th>       </tr>       <tr>         <td style=\"padding: 10px\">エンタープライズ</td>         <td style=\"padding: 10px\">10,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">プロフェッショナル</td>         <td style=\"padding: 10px\">5,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">ベーシック</td>         <td style=\"padding: 10px\">3,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">ミニマム</td>         <td style=\"padding: 10px\">3,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">上記以外</td>         <td style=\"padding: 10px\">3,000</td>       </tr>     </tbody>   </table>  <h3 id=\"webhook\">Webhookについて</h3>  <p>詳細は<a href=\"https://developer.freee.co.jp/docs/accounting/webhook\" target=\"_blank\">会計Webhook概要</a>を参照してください。</p>  <hr /> <h2 id=\"contact\">連絡先</h2>  <p>ご不明点、ご要望等は <a href=\"https://support.freee.co.jp/hc/ja/requests/new\">freee サポートデスクへのお問い合わせフォーム</a> からご連絡ください。</p> <hr />&copy; Since 2013 freee K.K.
 *
 * The version of the OpenAPI document: v1.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Freee\Accounting\Model;

use \ArrayAccess;
use \Freee\Accounting\ObjectSerializer;

/**
 * ApprovalRequestResponseApprovalRequest Class Doc Comment
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null  
 */
class ApprovalRequestResponseApprovalRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'approvalRequestResponse_approval_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'applicant_id' => 'int',
        'application_date' => 'string',
        'application_number' => 'string',
        'approval_flow_logs' => '\Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestApprovalFlowLogs[]',
        'approval_flow_route_id' => 'int',
        'approval_request_form' => '\Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestApprovalRequestForm',
        'approvers' => '\Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestApprovers[]',
        'comments' => '\Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestComments[]',
        'company_id' => 'int',
        'current_round' => 'int',
        'current_step_id' => 'int',
        'form_id' => 'int',
        'id' => 'int',
        'request_items' => '\Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestRequestItems[]',
        'status' => 'string',
        'title' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'applicant_id' => null,
        'application_date' => null,
        'application_number' => null,
        'approval_flow_logs' => null,
        'approval_flow_route_id' => null,
        'approval_request_form' => null,
        'approvers' => null,
        'comments' => null,
        'company_id' => null,
        'current_round' => null,
        'current_step_id' => null,
        'form_id' => null,
        'id' => null,
        'request_items' => null,
        'status' => null,
        'title' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'applicant_id' => 'applicant_id',
        'application_date' => 'application_date',
        'application_number' => 'application_number',
        'approval_flow_logs' => 'approval_flow_logs',
        'approval_flow_route_id' => 'approval_flow_route_id',
        'approval_request_form' => 'approval_request_form',
        'approvers' => 'approvers',
        'comments' => 'comments',
        'company_id' => 'company_id',
        'current_round' => 'current_round',
        'current_step_id' => 'current_step_id',
        'form_id' => 'form_id',
        'id' => 'id',
        'request_items' => 'request_items',
        'status' => 'status',
        'title' => 'title'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'applicant_id' => 'setApplicantId',
        'application_date' => 'setApplicationDate',
        'application_number' => 'setApplicationNumber',
        'approval_flow_logs' => 'setApprovalFlowLogs',
        'approval_flow_route_id' => 'setApprovalFlowRouteId',
        'approval_request_form' => 'setApprovalRequestForm',
        'approvers' => 'setApprovers',
        'comments' => 'setComments',
        'company_id' => 'setCompanyId',
        'current_round' => 'setCurrentRound',
        'current_step_id' => 'setCurrentStepId',
        'form_id' => 'setFormId',
        'id' => 'setId',
        'request_items' => 'setRequestItems',
        'status' => 'setStatus',
        'title' => 'setTitle'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'applicant_id' => 'getApplicantId',
        'application_date' => 'getApplicationDate',
        'application_number' => 'getApplicationNumber',
        'approval_flow_logs' => 'getApprovalFlowLogs',
        'approval_flow_route_id' => 'getApprovalFlowRouteId',
        'approval_request_form' => 'getApprovalRequestForm',
        'approvers' => 'getApprovers',
        'comments' => 'getComments',
        'company_id' => 'getCompanyId',
        'current_round' => 'getCurrentRound',
        'current_step_id' => 'getCurrentStepId',
        'form_id' => 'getFormId',
        'id' => 'getId',
        'request_items' => 'getRequestItems',
        'status' => 'getStatus',
        'title' => 'getTitle'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    const STATUS_DRAFT = 'draft';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_FEEDBACK = 'feedback';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_DRAFT,
            self::STATUS_IN_PROGRESS,
            self::STATUS_APPROVED,
            self::STATUS_REJECTED,
            self::STATUS_FEEDBACK,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['applicant_id'] = $data['applicant_id'] ?? null;
        $this->container['application_date'] = $data['application_date'] ?? null;
        $this->container['application_number'] = $data['application_number'] ?? null;
        $this->container['approval_flow_logs'] = $data['approval_flow_logs'] ?? null;
        $this->container['approval_flow_route_id'] = $data['approval_flow_route_id'] ?? null;
        $this->container['approval_request_form'] = $data['approval_request_form'] ?? null;
        $this->container['approvers'] = $data['approvers'] ?? null;
        $this->container['comments'] = $data['comments'] ?? null;
        $this->container['company_id'] = $data['company_id'] ?? null;
        $this->container['current_round'] = $data['current_round'] ?? null;
        $this->container['current_step_id'] = $data['current_step_id'] ?? null;
        $this->container['form_id'] = $data['form_id'] ?? null;
        $this->container['id'] = $data['id'] ?? null;
        $this->container['request_items'] = $data['request_items'] ?? null;
        $this->container['status'] = $data['status'] ?? null;
        $this->container['title'] = $data['title'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['applicant_id'] === null) {
            $invalidProperties[] = "'applicant_id' can't be null";
        }
        if (($this->container['applicant_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'applicant_id', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['applicant_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'applicant_id', must be bigger than or equal to 1.";
        }

        if ($this->container['application_date'] === null) {
            $invalidProperties[] = "'application_date' can't be null";
        }
        if ($this->container['application_number'] === null) {
            $invalidProperties[] = "'application_number' can't be null";
        }
        if ($this->container['approval_flow_logs'] === null) {
            $invalidProperties[] = "'approval_flow_logs' can't be null";
        }
        if ($this->container['approval_flow_route_id'] === null) {
            $invalidProperties[] = "'approval_flow_route_id' can't be null";
        }
        if (($this->container['approval_flow_route_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'approval_flow_route_id', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['approval_flow_route_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'approval_flow_route_id', must be bigger than or equal to 1.";
        }

        if ($this->container['approval_request_form'] === null) {
            $invalidProperties[] = "'approval_request_form' can't be null";
        }
        if ($this->container['approvers'] === null) {
            $invalidProperties[] = "'approvers' can't be null";
        }
        if ($this->container['comments'] === null) {
            $invalidProperties[] = "'comments' can't be null";
        }
        if ($this->container['company_id'] === null) {
            $invalidProperties[] = "'company_id' can't be null";
        }
        if (($this->container['company_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'company_id', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['company_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'company_id', must be bigger than or equal to 1.";
        }

        if ($this->container['current_round'] === null) {
            $invalidProperties[] = "'current_round' can't be null";
        }
        if (($this->container['current_round'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'current_round', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['current_round'] < 0)) {
            $invalidProperties[] = "invalid value for 'current_round', must be bigger than or equal to 0.";
        }

        if ($this->container['current_step_id'] === null) {
            $invalidProperties[] = "'current_step_id' can't be null";
        }
        if (($this->container['current_step_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'current_step_id', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['current_step_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'current_step_id', must be bigger than or equal to 1.";
        }

        if ($this->container['form_id'] === null) {
            $invalidProperties[] = "'form_id' can't be null";
        }
        if (($this->container['form_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'form_id', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['form_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'form_id', must be bigger than or equal to 1.";
        }

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if (($this->container['id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'id', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['id'] < 1)) {
            $invalidProperties[] = "invalid value for 'id', must be bigger than or equal to 1.";
        }

        if ($this->container['request_items'] === null) {
            $invalidProperties[] = "'request_items' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['title'] === null) {
            $invalidProperties[] = "'title' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets applicant_id
     *
     * @return int
     */
    public function getApplicantId()
    {
        return $this->container['applicant_id'];
    }

    /**
     * Sets applicant_id
     *
     * @param int $applicant_id 申請者のユーザーID
     *
     * @return self
     */
    public function setApplicantId($applicant_id)
    {

        if (($applicant_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $applicant_id when calling ApprovalRequestResponseApprovalRequest., must be smaller than or equal to 2147483647.');
        }
        if (($applicant_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $applicant_id when calling ApprovalRequestResponseApprovalRequest., must be bigger than or equal to 1.');
        }

        $this->container['applicant_id'] = $applicant_id;

        return $this;
    }

    /**
     * Gets application_date
     *
     * @return string
     */
    public function getApplicationDate()
    {
        return $this->container['application_date'];
    }

    /**
     * Sets application_date
     *
     * @param string $application_date 申請日 (yyyy-mm-dd)
     *
     * @return self
     */
    public function setApplicationDate($application_date)
    {
        $this->container['application_date'] = $application_date;

        return $this;
    }

    /**
     * Gets application_number
     *
     * @return string
     */
    public function getApplicationNumber()
    {
        return $this->container['application_number'];
    }

    /**
     * Sets application_number
     *
     * @param string $application_number 申請No.
     *
     * @return self
     */
    public function setApplicationNumber($application_number)
    {
        $this->container['application_number'] = $application_number;

        return $this;
    }

    /**
     * Gets approval_flow_logs
     *
     * @return \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestApprovalFlowLogs[]
     */
    public function getApprovalFlowLogs()
    {
        return $this->container['approval_flow_logs'];
    }

    /**
     * Sets approval_flow_logs
     *
     * @param \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestApprovalFlowLogs[] $approval_flow_logs 各種申請の承認履歴（配列）
     *
     * @return self
     */
    public function setApprovalFlowLogs($approval_flow_logs)
    {
        $this->container['approval_flow_logs'] = $approval_flow_logs;

        return $this;
    }

    /**
     * Gets approval_flow_route_id
     *
     * @return int
     */
    public function getApprovalFlowRouteId()
    {
        return $this->container['approval_flow_route_id'];
    }

    /**
     * Sets approval_flow_route_id
     *
     * @param int $approval_flow_route_id 申請経路ID
     *
     * @return self
     */
    public function setApprovalFlowRouteId($approval_flow_route_id)
    {

        if (($approval_flow_route_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $approval_flow_route_id when calling ApprovalRequestResponseApprovalRequest., must be smaller than or equal to 2147483647.');
        }
        if (($approval_flow_route_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $approval_flow_route_id when calling ApprovalRequestResponseApprovalRequest., must be bigger than or equal to 1.');
        }

        $this->container['approval_flow_route_id'] = $approval_flow_route_id;

        return $this;
    }

    /**
     * Gets approval_request_form
     *
     * @return \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestApprovalRequestForm
     */
    public function getApprovalRequestForm()
    {
        return $this->container['approval_request_form'];
    }

    /**
     * Sets approval_request_form
     *
     * @param \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestApprovalRequestForm $approval_request_form approval_request_form
     *
     * @return self
     */
    public function setApprovalRequestForm($approval_request_form)
    {
        $this->container['approval_request_form'] = $approval_request_form;

        return $this;
    }

    /**
     * Gets approvers
     *
     * @return \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestApprovers[]
     */
    public function getApprovers()
    {
        return $this->container['approvers'];
    }

    /**
     * Sets approvers
     *
     * @param \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestApprovers[] $approvers 承認者（配列）   承認ステップのresource_typeがunspecified (指定なし)の場合はapproversはレスポンスに含まれません。   しかし、resource_typeがunspecifiedの承認ステップにおいて誰かが承認・却下・差し戻しのいずれかのアクションを取った後は、    approversはレスポンスに含まれるようになります。    その場合approversにはアクションを行ったステップのIDとアクションを行ったユーザーのIDが含まれます。
     *
     * @return self
     */
    public function setApprovers($approvers)
    {
        $this->container['approvers'] = $approvers;

        return $this;
    }

    /**
     * Gets comments
     *
     * @return \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestComments[]
     */
    public function getComments()
    {
        return $this->container['comments'];
    }

    /**
     * Sets comments
     *
     * @param \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestComments[] $comments 各種申請のコメント一覧（配列）
     *
     * @return self
     */
    public function setComments($comments)
    {
        $this->container['comments'] = $comments;

        return $this;
    }

    /**
     * Gets company_id
     *
     * @return int
     */
    public function getCompanyId()
    {
        return $this->container['company_id'];
    }

    /**
     * Sets company_id
     *
     * @param int $company_id 事業所ID
     *
     * @return self
     */
    public function setCompanyId($company_id)
    {

        if (($company_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $company_id when calling ApprovalRequestResponseApprovalRequest., must be smaller than or equal to 2147483647.');
        }
        if (($company_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $company_id when calling ApprovalRequestResponseApprovalRequest., must be bigger than or equal to 1.');
        }

        $this->container['company_id'] = $company_id;

        return $this;
    }

    /**
     * Gets current_round
     *
     * @return int
     */
    public function getCurrentRound()
    {
        return $this->container['current_round'];
    }

    /**
     * Sets current_round
     *
     * @param int $current_round 現在のround。差し戻し等により申請がstepの最初からやり直しになるとroundの値が増えます。
     *
     * @return self
     */
    public function setCurrentRound($current_round)
    {

        if (($current_round > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $current_round when calling ApprovalRequestResponseApprovalRequest., must be smaller than or equal to 2147483647.');
        }
        if (($current_round < 0)) {
            throw new \InvalidArgumentException('invalid value for $current_round when calling ApprovalRequestResponseApprovalRequest., must be bigger than or equal to 0.');
        }

        $this->container['current_round'] = $current_round;

        return $this;
    }

    /**
     * Gets current_step_id
     *
     * @return int
     */
    public function getCurrentStepId()
    {
        return $this->container['current_step_id'];
    }

    /**
     * Sets current_step_id
     *
     * @param int $current_step_id 現在承認ステップID
     *
     * @return self
     */
    public function setCurrentStepId($current_step_id)
    {

        if (($current_step_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $current_step_id when calling ApprovalRequestResponseApprovalRequest., must be smaller than or equal to 2147483647.');
        }
        if (($current_step_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $current_step_id when calling ApprovalRequestResponseApprovalRequest., must be bigger than or equal to 1.');
        }

        $this->container['current_step_id'] = $current_step_id;

        return $this;
    }

    /**
     * Gets form_id
     *
     * @return int
     */
    public function getFormId()
    {
        return $this->container['form_id'];
    }

    /**
     * Sets form_id
     *
     * @param int $form_id 申請フォームID
     *
     * @return self
     */
    public function setFormId($form_id)
    {

        if (($form_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $form_id when calling ApprovalRequestResponseApprovalRequest., must be smaller than or equal to 2147483647.');
        }
        if (($form_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $form_id when calling ApprovalRequestResponseApprovalRequest., must be bigger than or equal to 1.');
        }

        $this->container['form_id'] = $form_id;

        return $this;
    }

    /**
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id 各種申請ID
     *
     * @return self
     */
    public function setId($id)
    {

        if (($id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $id when calling ApprovalRequestResponseApprovalRequest., must be smaller than or equal to 2147483647.');
        }
        if (($id < 1)) {
            throw new \InvalidArgumentException('invalid value for $id when calling ApprovalRequestResponseApprovalRequest., must be bigger than or equal to 1.');
        }

        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets request_items
     *
     * @return \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestRequestItems[]
     */
    public function getRequestItems()
    {
        return $this->container['request_items'];
    }

    /**
     * Sets request_items
     *
     * @param \Freee\Accounting\Model\ApprovalRequestResponseApprovalRequestRequestItems[] $request_items 各種申請の項目一覧（配列）
     *
     * @return self
     */
    public function setRequestItems($request_items)
    {
        $this->container['request_items'] = $request_items;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status 申請ステータス(draft:下書き, in_progress:申請中, approved:承認済, rejected:却下, feedback:差戻し)
     *
     * @return self
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string $title 申請タイトル
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


