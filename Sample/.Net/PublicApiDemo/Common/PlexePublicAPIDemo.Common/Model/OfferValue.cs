namespace PlexePublicAPIDemo.Common.Model
{
    public class OfferValue
    {
        public string OfferId { get; set; }
        public object FacilityLimit { get; set; }
        public object CreditLimit { get; set; }
        public Commission Commission { get; set; }
        public bool Secured { get; set; }
        public object Decision { get; set; }
        public int LoanType { get; set; }
        public object CashFlowLimit { get; set; }
        public object ReceivableLimit { get; set; }
    }
}