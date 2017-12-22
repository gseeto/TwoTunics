<?php
	class QQN {
		/**
		 * @return QQNodeAccessLevel
		 */
		static public function AccessLevel() {
			return new QQNodeAccessLevel('access_level', null, null);
		}
		/**
		 * @return QQNodeCharityPartner
		 */
		static public function CharityPartner() {
			return new QQNodeCharityPartner('charity_partner', null, null);
		}
		/**
		 * @return QQNodeDonation
		 */
		static public function Donation() {
			return new QQNodeDonation('donation', null, null);
		}
		/**
		 * @return QQNodeDonationStatus
		 */
		static public function DonationStatus() {
			return new QQNodeDonationStatus('donation_status', null, null);
		}
		/**
		 * @return QQNodeFashionPartner
		 */
		static public function FashionPartner() {
			return new QQNodeFashionPartner('fashion_partner', null, null);
		}
		/**
		 * @return QQNodeNeed
		 */
		static public function Need() {
			return new QQNodeNeed('need', null, null);
		}
		/**
		 * @return QQNodeSize
		 */
		static public function Size() {
			return new QQNodeSize('size', null, null);
		}
		/**
		 * @return QQNodeTransaction
		 */
		static public function Transaction() {
			return new QQNodeTransaction('transaction', null, null);
		}
		/**
		 * @return QQNodeUser
		 */
		static public function User() {
			return new QQNodeUser('user', null, null);
		}
	}
?>