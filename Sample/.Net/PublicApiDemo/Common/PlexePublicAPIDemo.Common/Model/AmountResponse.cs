using System;
namespace PlexePublicAPIDemo.Common.Model
{
    public class AmountResponse
    {
        public AmountResponse()
        {
        }
        public AmountResponse(double value, string currencyCode)
        {
            this.Value = Math.Round(value, 2);
            this.CurrencyCode = currencyCode;
        }

        public double? Value { get; set; }

        public string CurrencyCode { get; set; }
    }
}
