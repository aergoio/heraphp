<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Types;

/**
 * *
 * AergoRPCService is the main RPC service providing endpoints to interact 
 * with the node and blockchain. If not otherwise noted, methods are unary requests.
 */
class AergoRPCServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Returns current blockchain status (best block's height and hash)
     * @param \Types\PBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Blockchain(\Types\PBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/Blockchain',
        $argument,
        ['\Types\BlockchainStatus', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns current blockchain's basic information
     * @param \Types\PBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetChainInfo(\Types\PBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetChainInfo',
        $argument,
        ['\Types\ChainInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns current chain statistics
     * @param \Types\PBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ChainStat(\Types\PBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/ChainStat',
        $argument,
        ['\Types\ChainStats', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns list of Blocks without body according to request
     * @param \Types\ListParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListBlockHeaders(\Types\ListParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/ListBlockHeaders',
        $argument,
        ['\Types\BlockHeaderList', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns list of block metadata (hash, header, and number of transactions) according to request
     * @param \Types\ListParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListBlockMetadata(\Types\ListParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/ListBlockMetadata',
        $argument,
        ['\Types\BlockMetadataList', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a stream of new blocks as they get added to the blockchain
     * @param \Types\PBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListBlockStream(\Types\PBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/types.AergoRPCService/ListBlockStream',
        $argument,
        ['\Types\Block', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a stream of new block's metadata as they get added to the blockchain
     * @param \Types\PBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListBlockMetadataStream(\Types\PBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/types.AergoRPCService/ListBlockMetadataStream',
        $argument,
        ['\Types\BlockMetadata', 'decode'],
        $metadata, $options);
    }

    /**
     * Return a single block incl. header and body, queried by hash or number
     * @param \Types\SingleBytes $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetBlock(\Types\SingleBytes $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetBlock',
        $argument,
        ['\Types\Block', 'decode'],
        $metadata, $options);
    }

    /**
     * Return a single block's metdata (hash, header, and number of transactions), queried by hash or number
     * @param \Types\SingleBytes $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetBlockMetadata(\Types\SingleBytes $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetBlockMetadata',
        $argument,
        ['\Types\BlockMetadata', 'decode'],
        $metadata, $options);
    }

    /**
     * Return a single block's body, queried by hash or number and list parameters
     * @param \Types\BlockBodyParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetBlockBody(\Types\BlockBodyParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetBlockBody',
        $argument,
        ['\Types\BlockBodyPaged', 'decode'],
        $metadata, $options);
    }

    /**
     * Return a single transaction, queried by transaction hash
     * @param \Types\SingleBytes $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetTX(\Types\SingleBytes $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetTX',
        $argument,
        ['\Types\Tx', 'decode'],
        $metadata, $options);
    }

    /**
     * Return information about transaction in block, queried by transaction hash
     * @param \Types\SingleBytes $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetBlockTX(\Types\SingleBytes $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetBlockTX',
        $argument,
        ['\Types\TxInBlock', 'decode'],
        $metadata, $options);
    }

    /**
     * Return transaction receipt, queried by transaction hash
     * @param \Types\SingleBytes $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetReceipt(\Types\SingleBytes $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetReceipt',
        $argument,
        ['\Types\Receipt', 'decode'],
        $metadata, $options);
    }

    /**
     * Return ABI stored at contract address
     * @param \Types\SingleBytes $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetABI(\Types\SingleBytes $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetABI',
        $argument,
        ['\Types\ABI', 'decode'],
        $metadata, $options);
    }

    /**
     * Sign and send a transaction from an unlocked account
     * @param \Types\Tx $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SendTX(\Types\Tx $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/SendTX',
        $argument,
        ['\Types\CommitResult', 'decode'],
        $metadata, $options);
    }

    /**
     * Sign transaction with unlocked account
     * @param \Types\Tx $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SignTX(\Types\Tx $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/SignTX',
        $argument,
        ['\Types\Tx', 'decode'],
        $metadata, $options);
    }

    /**
     * Verify validity of transaction
     * @param \Types\Tx $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function VerifyTX(\Types\Tx $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/VerifyTX',
        $argument,
        ['\Types\VerifyResult', 'decode'],
        $metadata, $options);
    }

    /**
     * Commit a signed transaction
     * @param \Types\TxList $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CommitTX(\Types\TxList $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/CommitTX',
        $argument,
        ['\Types\CommitResultList', 'decode'],
        $metadata, $options);
    }

    /**
     * Return state of account
     * @param \Types\SingleBytes $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetState(\Types\SingleBytes $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetState',
        $argument,
        ['\Types\State', 'decode'],
        $metadata, $options);
    }

    /**
     * Return state of account, including merkle proof
     * @param \Types\AccountAndRoot $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetStateAndProof(\Types\AccountAndRoot $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetStateAndProof',
        $argument,
        ['\Types\AccountProof', 'decode'],
        $metadata, $options);
    }

    /**
     * Create a new account in this node
     * @param \Types\Personal $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateAccount(\Types\Personal $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/CreateAccount',
        $argument,
        ['\Types\Account', 'decode'],
        $metadata, $options);
    }

    /**
     * Return list of accounts in this node
     * @param \Types\PBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetAccounts(\Types\PBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetAccounts',
        $argument,
        ['\Types\AccountList', 'decode'],
        $metadata, $options);
    }

    /**
     * Lock account in this node
     * @param \Types\Personal $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function LockAccount(\Types\Personal $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/LockAccount',
        $argument,
        ['\Types\Account', 'decode'],
        $metadata, $options);
    }

    /**
     * Unlock account in this node
     * @param \Types\Personal $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UnlockAccount(\Types\Personal $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/UnlockAccount',
        $argument,
        ['\Types\Account', 'decode'],
        $metadata, $options);
    }

    /**
     * Import account to this node
     * @param \Types\ImportFormat $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ImportAccount(\Types\ImportFormat $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/ImportAccount',
        $argument,
        ['\Types\Account', 'decode'],
        $metadata, $options);
    }

    /**
     * Export account stored in this node as wif format
     * @param \Types\Personal $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ExportAccount(\Types\Personal $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/ExportAccount',
        $argument,
        ['\Types\SingleBytes', 'decode'],
        $metadata, $options);
    }

    /**
     * Export account stored in this node as keystore format
     * @param \Types\Personal $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ExportAccountKeystore(\Types\Personal $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/ExportAccountKeystore',
        $argument,
        ['\Types\SingleBytes', 'decode'],
        $metadata, $options);
    }

    /**
     * Query a contract method
     * @param \Types\Query $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function QueryContract(\Types\Query $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/QueryContract',
        $argument,
        ['\Types\SingleBytes', 'decode'],
        $metadata, $options);
    }

    /**
     * Query contract state
     * @param \Types\StateQuery $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function QueryContractState(\Types\StateQuery $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/QueryContractState',
        $argument,
        ['\Types\StateQueryProof', 'decode'],
        $metadata, $options);
    }

    /**
     * Return result of vote
     * @param \Types\VoteParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetVotes(\Types\VoteParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetVotes',
        $argument,
        ['\Types\VoteList', 'decode'],
        $metadata, $options);
    }

    /**
     * Return staking, voting info for account
     * @param \Types\AccountAddress $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetAccountVotes(\Types\AccountAddress $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetAccountVotes',
        $argument,
        ['\Types\AccountVoteInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * Return staking information
     * @param \Types\AccountAddress $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetStaking(\Types\AccountAddress $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetStaking',
        $argument,
        ['\Types\Staking', 'decode'],
        $metadata, $options);
    }

    /**
     * Return name information
     * @param \Types\Name $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetNameInfo(\Types\Name $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetNameInfo',
        $argument,
        ['\Types\NameInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns a stream of event as they get added to the blockchain
     * @param \Types\FilterInfo $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListEventStream(\Types\FilterInfo $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/types.AergoRPCService/ListEventStream',
        $argument,
        ['\Types\Event', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns list of event
     * @param \Types\FilterInfo $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListEvents(\Types\FilterInfo $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/ListEvents',
        $argument,
        ['\Types\EventList', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns configs and statuses of server
     * @param \Types\KeyParams $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetServerInfo(\Types\KeyParams $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetServerInfo',
        $argument,
        ['\Types\ServerInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns status of consensus and bps
     * @param \Types\PBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetConsensusInfo(\Types\PBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetConsensusInfo',
        $argument,
        ['\Types\ConsensusInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * Returns enterprise config
     * @param \Types\EnterpriseConfigKey $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetEnterpriseConfig(\Types\EnterpriseConfigKey $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/types.AergoRPCService/GetEnterpriseConfig',
        $argument,
        ['\Types\EnterpriseConfig', 'decode'],
        $metadata, $options);
    }

}
