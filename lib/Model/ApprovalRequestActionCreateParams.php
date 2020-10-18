<?php
/**
 * ApprovalRequestActionCreateParams
 *
 * PHP version 5
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
 * OpenAPI Generator version: 4.3.1
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
 * ApprovalRequestActionCreateParams Class Doc Comment
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ApprovalRequestActionCreateParams implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'approvalRequestActionCreateParams';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'approval_action' => 'string',
        'company_id' => 'int',
        'next_approver_id' => 'int',
        'target_round' => 'int',
        'target_step_id' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'approval_action' => null,
        'company_id' => null,
        'next_approver_id' => null,
        'target_round' => null,
        'target_step_id' => null
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
        'approval_action' => 'approval_action',
        'company_id' => 'company_id',
        'next_approver_id' => 'next_approver_id',
        'target_round' => 'target_round',
        'target_step_id' => 'target_step_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'approval_action' => 'setApprovalAction',
        'company_id' => 'setCompanyId',
        'next_approver_id' => 'setNextApproverId',
        'target_round' => 'setTargetRound',
        'target_step_id' => 'setTargetStepId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'approval_action' => 'getApprovalAction',
        'company_id' => 'getCompanyId',
        'next_approver_id' => 'getNextApproverId',
        'target_round' => 'getTargetRound',
        'target_step_id' => 'getTargetStepId'
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

    const APPROVAL_ACTION_APPROVE = 'approve';
    const APPROVAL_ACTION_FORCE_APPROVE = 'force_approve';
    const APPROVAL_ACTION_CANCEL = 'cancel';
    const APPROVAL_ACTION_REJECT = 'reject';
    const APPROVAL_ACTION_FEEDBACK = 'feedback';
    const APPROVAL_ACTION_FORCE_FEEDBACK = 'force_feedback';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getApprovalActionAllowableValues()
    {
        return [
            self::APPROVAL_ACTION_APPROVE,
            self::APPROVAL_ACTION_FORCE_APPROVE,
            self::APPROVAL_ACTION_CANCEL,
            self::APPROVAL_ACTION_REJECT,
            self::APPROVAL_ACTION_FEEDBACK,
            self::APPROVAL_ACTION_FORCE_FEEDBACK,
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
        $this->container['approval_action'] = isset($data['approval_action']) ? $data['approval_action'] : null;
        $this->container['company_id'] = isset($data['company_id']) ? $data['company_id'] : null;
        $this->container['next_approver_id'] = isset($data['next_approver_id']) ? $data['next_approver_id'] : null;
        $this->container['target_round'] = isset($data['target_round']) ? $data['target_round'] : null;
        $this->container['target_step_id'] = isset($data['target_step_id']) ? $data['target_step_id'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['approval_action'] === null) {
            $invalidProperties[] = "'approval_action' can't be null";
        }
        $allowedValues = $this->getApprovalActionAllowableValues();
        if (!is_null($this->container['approval_action']) && !in_array($this->container['approval_action'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'approval_action', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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

        if (!is_null($this->container['next_approver_id']) && ($this->container['next_approver_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'next_approver_id', must be smaller than or equal to 2147483647.";
        }

        if (!is_null($this->container['next_approver_id']) && ($this->container['next_approver_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'next_approver_id', must be bigger than or equal to 1.";
        }

        if ($this->container['target_round'] === null) {
            $invalidProperties[] = "'target_round' can't be null";
        }
        if (($this->container['target_round'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'target_round', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['target_round'] < 0)) {
            $invalidProperties[] = "invalid value for 'target_round', must be bigger than or equal to 0.";
        }

        if ($this->container['target_step_id'] === null) {
            $invalidProperties[] = "'target_step_id' can't be null";
        }
        if (($this->container['target_step_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'target_step_id', must be smaller than or equal to 2147483647.";
        }

        if (($this->container['target_step_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'target_step_id', must be bigger than or equal to 1.";
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
     * Gets approval_action
     *
     * @return string
     */
    public function getApprovalAction()
    {
        return $this->container['approval_action'];
    }

    /**
     * Sets approval_action
     *
     * @param string $approval_action 操作(approve: 承認する、force_approve: 代理承認する、cancel: 申請を取り消す、reject: 却下する、feedback: 申請者へ差し戻す、force_feedback: 承認済み・却下済みを取り消す)
     *
     * @return $this
     */
    public function setApprovalAction($approval_action)
    {
        $allowedValues = $this->getApprovalActionAllowableValues();
        if (!in_array($approval_action, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'approval_action', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['approval_action'] = $approval_action;

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
     * @return $this
     */
    public function setCompanyId($company_id)
    {

        if (($company_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $company_id when calling ApprovalRequestActionCreateParams., must be smaller than or equal to 2147483647.');
        }
        if (($company_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $company_id when calling ApprovalRequestActionCreateParams., must be bigger than or equal to 1.');
        }

        $this->container['company_id'] = $company_id;

        return $this;
    }

    /**
     * Gets next_approver_id
     *
     * @return int|null
     */
    public function getNextApproverId()
    {
        return $this->container['next_approver_id'];
    }

    /**
     * Sets next_approver_id
     *
     * @param int|null $next_approver_id 次ステップの承認者のユーザーID
     *
     * @return $this
     */
    public function setNextApproverId($next_approver_id)
    {

        if (!is_null($next_approver_id) && ($next_approver_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $next_approver_id when calling ApprovalRequestActionCreateParams., must be smaller than or equal to 2147483647.');
        }
        if (!is_null($next_approver_id) && ($next_approver_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $next_approver_id when calling ApprovalRequestActionCreateParams., must be bigger than or equal to 1.');
        }

        $this->container['next_approver_id'] = $next_approver_id;

        return $this;
    }

    /**
     * Gets target_round
     *
     * @return int
     */
    public function getTargetRound()
    {
        return $this->container['target_round'];
    }

    /**
     * Sets target_round
     *
     * @param int $target_round 対象round。差し戻し等により申請がstepの最初からやり直しになるとroundの値が増えます。各種申請の取得APIレスポンス.current_roundを送信してください。
     *
     * @return $this
     */
    public function setTargetRound($target_round)
    {

        if (($target_round > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $target_round when calling ApprovalRequestActionCreateParams., must be smaller than or equal to 2147483647.');
        }
        if (($target_round < 0)) {
            throw new \InvalidArgumentException('invalid value for $target_round when calling ApprovalRequestActionCreateParams., must be bigger than or equal to 0.');
        }

        $this->container['target_round'] = $target_round;

        return $this;
    }

    /**
     * Gets target_step_id
     *
     * @return int
     */
    public function getTargetStepId()
    {
        return $this->container['target_step_id'];
    }

    /**
     * Sets target_step_id
     *
     * @param int $target_step_id 対象承認ステップID 各種申請の取得APIレスポンス.current_step_idを送信してください。
     *
     * @return $this
     */
    public function setTargetStepId($target_step_id)
    {

        if (($target_step_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $target_step_id when calling ApprovalRequestActionCreateParams., must be smaller than or equal to 2147483647.');
        }
        if (($target_step_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $target_step_id when calling ApprovalRequestActionCreateParams., must be bigger than or equal to 1.');
        }

        $this->container['target_step_id'] = $target_step_id;

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
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
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

